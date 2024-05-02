<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferItemResource\Pages;
use App\Models\OfferItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfferItemResource extends Resource
{
    protected static ?string $model = OfferItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
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
                    Forms\Components\Select::make('type')
                        ->label('Type')
                        ->options([
                            'text' => 'Text',
                            'select' => 'Select',
                            'checkbox' => 'Checkbox',
                            'fileInput' => 'File Input',
                        ])
                        ->reactive()
                        ->afterStateUpdated(function (callable $set, $state) {
                            $set('value', null); // Ensures value is reset when type changes
                        }),
                    Forms\Components\TextInput::make('value')
                        ->label('Value')
                        ->visible(fn ($record) => in_array($record['type'], ['text', 'select', 'fileInput'])),
                    Forms\Components\Checkbox::make('value')
                        ->label('Value')
                        ->visible(fn ($record) => $record['type'] === 'checkbox'),
                    Forms\Components\TextInput::make('price')
                        ->label('Price')
                        ->numeric()
                        ->prefix('CHF')
                        ->visible(fn ($record) => $record['type'] !== 'checkbox'), // Price field visibility
                    Forms\Components\Repeater::make('options')
                        ->label('Options')
                        ->schema([
                            Forms\Components\TextInput::make('key')
                                ->label('Key'),
                            Forms\Components\TextInput::make('label')
                                ->label('Label'),
                            Forms\Components\TextInput::make('price')
                                ->label('Price')
                                ->numeric()
                                ->prefix('CHF'),
                        ])
                        ->visible(fn ($record) => $record['type'] === 'select')
                        ->createItemButtonLabel('Add Option'),
                    Forms\Components\FileUpload::make('value')
                        ->label('File')
                        ->visible(fn ($record) => $record['type'] === 'fileInput')
                        ->directory('custom-attributes')
                        ->disk('public'),
                ])
                ->grid(2)
                ->columnSpan(2)
                ->createItemButtonLabel('Add Custom Attribute'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('price')->money('usd'),
            Tables\Columns\BooleanColumn::make('is_popular'),
            
        ])->filters([
            //
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfferItems::route('/'),
            'create' => Pages\CreateOfferItem::route('/create'),
            'edit' => Pages\EditOfferItem::route('/{record}/edit'),
        ];
    }
}
