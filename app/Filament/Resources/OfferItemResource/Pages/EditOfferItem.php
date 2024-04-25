<?php

namespace App\Filament\Resources\OfferItemResource\Pages;

use App\Filament\Resources\OfferItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOfferItem extends EditRecord
{
    protected static string $resource = OfferItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
