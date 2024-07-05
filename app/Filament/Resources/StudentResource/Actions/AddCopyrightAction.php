<?php

namespace App\Filament\Resources\StudentResource\Actions;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use App\Services\WatermarkService; // Add this line to import the WatermarkService

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
                            WatermarkService::addWatermark($imagePath, $imagePath, $watermarkPath);
                            $photo->update(['has_copyright' => true]);
                        }
                    }
                }
            });
    }
}
