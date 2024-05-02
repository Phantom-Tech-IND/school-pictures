<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferItemsRelationManagerResource\RelationManagers\OfferItemsRelationManager;
use App\Filament\Resources\OffersResource\Pages;
use App\Models\Offers;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OffersResource extends Resource
{
    protected static ?string $model = Offers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::count();

        return $count > 100 ? '100+' : (string) $count;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                \Filament\Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('offers/images')
                    ->required()
                    ->columnSpan('full'),
                \Filament\Forms\Components\FileUpload::make('photo_gallery')
                    ->label('Photo Gallery')
                    ->image()
                    ->multiple()
                    ->directory('offers/photo_gallery')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Featured Photo')
                    ->circular()
                    ->size(50),
                Tables\Columns\ImageColumn::make('photo_gallery')
                    ->label('Photo Gallery')
                    ->limit(3)
                    ->circular()
                    ->limitedRemainingText()
                    ->stacked()
                    ->size(50),
            ])
            ->filters([
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
            OfferItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffers::route('/create'),
            'edit' => Pages\EditOffers::route('/{record}/edit'),
        ];
    }
}
