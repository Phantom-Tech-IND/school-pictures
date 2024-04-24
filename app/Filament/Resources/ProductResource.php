<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\TextInput::make('product_type')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->searchable()
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('CHF')
                    ->required(),
                Forms\Components\Checkbox::make('is_digital')
                    ->label('Is Digital')
                    ->inline(false)
                    ->required(),
                TagsInput::make('tags')->separator(',')->columnSpan(2),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->columnSpan(2)
                    ->directory('product-photos')
                    ->disk('public'),
                MarkdownEditor::make('description')
                    ->label('Description')
                    ->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('product_type'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('tags')
                    ->badge()->separator(','),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50),
                Tables\Columns\ImageColumn::make('photo'),
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
            //

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
