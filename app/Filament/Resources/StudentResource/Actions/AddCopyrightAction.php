<?php

namespace App\Filament\Resources\StudentResource\Actions;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Intervention\Image\ImageManagerStatic as Image; // Added this line to import the Image class

class AddCopyrightAction extends BulkAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Add Copyright')
            ->action(function (Collection $records) {
                foreach ($records as $record) {
                    foreach ($record->photos as $photo) {
                        if (!$photo->has_copyright) {
                            $imagePath = storage_path('app/public/' . $photo->photo_path);
                            $watermarkPath = public_path('watermark.png');
                            $this->watermarkPhoto($imagePath, $imagePath, $watermarkPath);
                            $photo->update(['has_copyright' => true]);
                        }
                    }
                }
            });
    }

    public function watermarkPhotoPattern(string $originalFilePath, string $filePath2Save, string $watermarkPath = null)
    {
        $watermarkPath = $watermarkPath ?? public_path('watermark.png');

        if (\File::exists($watermarkPath)) {

            $watermarkImg = Image::make($watermarkPath);
            $img = Image::make($originalFilePath);
            $wmarkWidth = $watermarkImg->width();
            $wmarkHeight = $watermarkImg->height();

            $imgWidth = $img->width();
            $imgHeight = $img->height();

            $x = 0;
            $y = 0;
            while ($y <= $imgHeight) {
                $img->insert($watermarkPath, 'top-left', $x, $y);
                $x += $wmarkWidth;
                if ($x >= $imgWidth) {
                    $x = 0;
                    $y += $wmarkHeight;
                }
            }
            $img->save($filePath2Save);

            $watermarkImg->destroy();
            $img->destroy(); //  to free memory in case you have a lot of images to be processed
        }
        return $filePath2Save;
    }

    public function watermarkPhoto(string $originalFilePath, string $filePath2Save, string $watermarkPath = null)
    {
        $watermarkPath = $watermarkPath ?? public_path('watermark.png');

        $watermarkImg = Image::make($watermarkPath);
        $img = Image::make($originalFilePath);

        // Resize watermark to 80% of the image size
        $watermarkImg->resize($img->width() * 0.8, $img->height() * 0.8, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Calculate the center position
        $x = intval(($img->width() - $watermarkImg->width()) / 2);
        $y = intval(($img->height() - $watermarkImg->height()) / 2);

        // Insert watermark at the center
        $img->insert($watermarkImg, 'top-left', $x, $y);
        $img->save($filePath2Save);

        $watermarkImg->destroy();
        $img->destroy();
        return $filePath2Save;
    }
}
