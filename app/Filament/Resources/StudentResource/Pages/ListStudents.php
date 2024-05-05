<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;

use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
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
                    $targetPath = public_path('media/kindergarden/' . $dirName);
                } elseif (str_starts_with($dirName, 'SH-')) {
                    $targetPath = public_path('media/school/' . $dirName);
                } else {
                    continue;
                }

                if (!file_exists($targetPath)) {
                    mkdir($targetPath, 0777, true);
                }

                foreach (new \DirectoryIterator($file->getPathname()) as $fileInfo) {
                    if (!$fileInfo->isDot()) {
                        rename($fileInfo->getPathname(), $targetPath . '/' . $fileInfo->getFilename());
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
                    if (Artisan::call('parse:student-photos') === 0) { // Check if command was successful
                        // Delete the directories if the command was successful
                        $this->deleteDirectory(public_path('media/kindergarden'));
                        $this->deleteDirectory(public_path('media/school'));
                        $this->deleteDirectory(public_path('media/temp'));

                    } else {
                        Notification::make()
                            ->title('Failed to organize photos.')
                            ->danger()
                            ->send();
                    }
                } else {
                    Notification::make()
                        ->title('Failed to open ZIP file.')
                        ->danger()
                        ->send();
                }
            }
        }
    }

    private function deleteDirectory(string $path): void
    {
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }

        rmdir($path);
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('syncPhotos')
                ->label('Sync Photos')
                ->action(function () {
                    Artisan::call('parse:student-photos');
                }),
            Action::make('uploadPhotos')
                ->label('Upload Student Photos')
                ->form([
                    FileUpload::make('zipFolder')
                        ->label('Student Photo ZIP')
                        ->disk('public')
                        ->required()
                        ->acceptedFileTypes(['application/zip'])
                        ->directory(true)
                        ->multiple()
                        ->maxSize(2000048)
                        ->placeholder('Drop ZIP file here or click to upload'),
                ])
                ->action(fn (array $data) => $this->handleUploadAction($data)),
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
