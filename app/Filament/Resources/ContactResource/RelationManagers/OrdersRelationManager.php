<?php

namespace App\Filament\Resources\ContactResource\RelationManagers;

use App\Filament\Resources\OrderResource\Pages\EditOrder;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'Orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('uuid')
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->money('CHF'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge(function ($record) {
                        return $record->status;
                    })
                    ->colors([
                        'success' => 'completed',
                        'danger' => 'cancelled',
                        'warning' => 'pending',
                        'info' => 'processing',
                    ]),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
            ])
            ->bulkActions([
            ])
            ->recordUrl(function ($record): string {
                return EditOrder::getUrl([$record->id]);
            });
    }
}
