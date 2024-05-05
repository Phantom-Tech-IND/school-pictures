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
                        ->placeholder('Drop ZIP file here or click to upload'),
                ])
                ->action(function (array $data): void {
                    if (isset($data['zipFolder'])) {
                        $zipPath = Storage::disk('public')->path($data['zipFolder']);
                        $zip = new ZipArchive();

                        if ($zip->open($zipPath) === true) {
                            $extractPath = public_path('media/temp');
                            $zip->extractTo($extractPath);
                            $zip->close();

                            // New code to handle directory checking and moving
                            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($extractPath));

                            foreach ($iterator as $file) {
                                if ($file->isDir()) {
                                    $dirName = $file->getFilename();
                                    if (str_starts_with($dirName, 'KG-')) {
                                        $targetPath = public_path('media/temp/kindergarden/' . $dirName);
                                    } elseif (str_starts_with($dirName, 'SH-')) {
                                        $targetPath = public_path('media/temp/school/' . $dirName);
                                    } else {
                                        continue;
                                    }

                                    if (!file_exists($targetPath)) {
                                        mkdir($targetPath, 0777, true);
                                    }

                                    // Move all files from the current directory to the target directory
                                    foreach (new \DirectoryIterator($file->getPathname()) as $fileInfo) {
                                        if (!$fileInfo->isDot()) {
                                            rename($fileInfo->getPathname(), $targetPath . '/' . $fileInfo->getFilename());
                                        }
                                    }
                                }
                            }

                            Notification::make()
                                ->title('Photos organized successfully.')
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Failed to open ZIP file.')
                                ->danger()
                                ->send();
                        }
                    }
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
