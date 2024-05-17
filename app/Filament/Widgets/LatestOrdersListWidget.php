<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrdersListWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Order::query()->latest()->with('contact'); // Ensure to eager load the contact relationship
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->label('Order ID'),
            TextColumn::make('created_at')->label('Date')->dateTime(),
            TextColumn::make('amount')->label('Amount')->money('CHF'),
            TextColumn::make('contact.name')->label('Contact Name'), // Display the contact's name
        ];
    }
}

