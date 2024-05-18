<?php

namespace App\Filament\Resources\ContactRelationManagerResource\RelationManagers;

use App\Filament\Resources\ContactResource\Pages\EditContact;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ContactsRelationManager extends RelationManager
{
    protected static string $relationship = 'Contact';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email')
                    ->url(function ($record) {
                        return 'mailto:'.$record->email;
                    })
                    ->color('primary')
                    ->icon('heroicon-o-envelope'),
                Tables\Columns\TextColumn::make('phone')->url(function ($record) {
                    return 'tel:'.$record->phone;
                })
                    ->color('success')
                    ->icon('heroicon-o-phone')
                    ->openUrlInNewTab(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
            ])
            ->bulkActions([
            ])
            ->recordUrl(function ($record): string {
                return EditContact::getUrl([$record->id]);
            });
    }
}
