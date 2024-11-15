<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    private function processExtractedFiles(string $path): void
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($iterator as $file) {
            if ($file->isDir()) {
                $dirName = $file->getFilename();
                if (str_starts_with($dirName, 'KG-')) {
                    $targetPath = public_path('media/kindergarden/'.$dirName);
                } elseif (str_starts_with($dirName, 'SH-')) {
                    $targetPath = public_path('media/school/'.$dirName);
                } else {
                    continue;
                }

                if (! file_exists($targetPath)) {
                    mkdir($targetPath, 0777, true);
                }

                foreach (new \DirectoryIterator($file->getPathname()) as $fileInfo) {
                    if (! $fileInfo->isDot()) {
                        rename($fileInfo->getPathname(), $targetPath.'/'.$fileInfo->getFilename());
                    }
                }
            }
        }
    }

    private function handleUploadAction(array $data): void
    {
        if (isset($data['zipFolder'])) {
            foreach ($data['zipFolder'] as $file) {
                $zipPath = Storage::disk('public')->path($file);
                $zip = new ZipArchive();

                if ($zip->open($zipPath) === true) {
                    $extractPath = public_path('media/temp');
                    $zip->extractTo($extractPath);
                    $zip->close();

                    $this->processExtractedFiles($extractPath);

                    // Call the Artisan command here
                    Artisan::call('parse:student-photos');
                } else {
                    Notification::make()
                        ->title('Failed to open ZIP file.')
                        ->danger()
                        ->send();
                }
            }
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('uploadPhotos')
                ->label('Upload Multiple Students')
                ->form([
                    FileUpload::make('zipFolder')
                        ->label('Compressed files allowed')
                        ->disk('public')
                        ->optimize('jpg')
                        ->required()
                        ->optimize('webp')
                        ->acceptedFileTypes(['application/zip', 'application/x-zip', 'application/x-zip-compressed', 'application/octet-stream'])
                        ->directory(true)
                        ->multiple()
                        ->maxSize(2000048)
                        ->placeholder('Drop compressed file here or click to upload'),
                ])
                ->action(fn (array $data) => $this->handleUploadAction($data)),
            Action::make('syncPhotos')
                ->label('Sync Photos')
                ->action(function () {
                    Artisan::call('parse:student-photos');
                }),
        ];
    }

    protected function getModals(): array
    {
        return [
            'uploadPhotosModal' => [
                'view' => 'filament.pages.upload-student-images',
            ],
        ];
    }
}
