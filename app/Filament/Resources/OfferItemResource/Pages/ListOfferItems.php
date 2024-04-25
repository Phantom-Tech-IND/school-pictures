<?php

namespace App\Filament\Resources\OfferItemResource\Pages;

use App\Filament\Resources\OfferItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOfferItems extends ListRecords
{
    protected static string $resource = OfferItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
