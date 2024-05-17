<?php

namespace App\Filament\Widgets;

use App\Models\Order; // Corrected import for Order model
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn; // Import BadgeColumn
use Filament\Tables\Columns\TextColumn; // Corrected import for TextColumn
use Filament\Tables\Filters\SelectFilter; // Import SelectFilter
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Enums\FiltersLayout;

class LatestOrdersListWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()->latest()->with('contact')
            )
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->date('d M Y'),
                TextColumn::make('contact.name')
                    ->label('Contact Name')
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('CHF')
                    ->sortable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'completed',
                        'danger' => 'cancelled',
                        'warning' => 'pending',
                        'info' => 'processing',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                    ])
            ], layout: FiltersLayout::AboveContent);
    }
}
