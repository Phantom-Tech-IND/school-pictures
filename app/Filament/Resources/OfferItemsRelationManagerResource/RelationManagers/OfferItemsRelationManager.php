<?php

namespace App\Filament\Resources\OfferItemsRelationManagerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OfferItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'offerItems';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Textarea::make('description')->required(),
            Forms\Components\TextInput::make('price')->numeric()->required(),
            Forms\Components\Toggle::make('is_popular'),
            Forms\Components\Repeater::make('custom_attributes')
                ->label('Custom Attributes')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),

                ])
                ->grid(2)
                ->columnSpan(2)
                ->createItemButtonLabel('Add Custom Attribute'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('price')->money('usd'),
                Tables\Columns\BooleanColumn::make('is_popular'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
