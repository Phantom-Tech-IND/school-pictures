<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;

class WatermarkService
{
    public static function addWatermarkWithPattern(string $originalFilePath, string $filePath2Save, ?string $watermarkPath = null)
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
            $img->destroy(); // to free memory in case you have a lot of images to be processed
        }

        return $filePath2Save;
    }

    public static function addWatermark(string $originalFilePath, string $filePath2Save, ?string $watermarkPath = null)
    {
        $watermarkPath = $watermarkPath ?? public_path('watermark.png');

        $watermarkImg = Image::make($watermarkPath);
        $img = Image::make($originalFilePath);

        // Resize watermark to 80% of the image size
        $watermarkImg->resize($img->width() * 0.8, $img->height() * 0.8, function ($constraint) {
            $constraint->aspectRatio();
        });

        $watermarkImg->opacity(30);

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
