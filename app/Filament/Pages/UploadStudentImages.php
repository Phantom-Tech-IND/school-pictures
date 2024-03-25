<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Livewire\WithFileUploads;

class UploadStudentImages extends Page
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-document-plus';

    public $photos = [];

    public $files = [];

    public $folderName = '';

    protected static string $view = 'filament.pages.upload-student-images';

    public function uploadPhotos()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max per image
        ]);

        foreach ($this->photos as $photo) {
            // Assuming you want to keep the original file names
            $fileName = $photo->getClientOriginalName();
            $photo->storeAs('public/student_images', $fileName);
        }

        $this->photos = []; // Reset the photos array after upload
        $this->notify('success', 'Images uploaded successfully!');
    }
}
