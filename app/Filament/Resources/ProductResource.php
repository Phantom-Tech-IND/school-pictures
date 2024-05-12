<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::count();

        return $count > 100 ? '100+' : (string) $count;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('product_type')
                    ->searchable()
                    ->options([
                        'personal' => 'Personal',
                        'school' => 'School Pictures',
                    ])
                    ->default('personal')
                    ->required(),
                BelongsToManyMultiSelect::make('categories')
                    ->preload()
                    ->relationship('categories', 'name'),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('CHF')
                    ->required(),
                MarkdownEditor::make('description')
                    ->label('Description')
                    ->columnSpan(2),
                Section::make('Additional Information')
                    ->collapsed()
                    ->schema([

                        MarkdownEditor::make('additional_information')
                            ->label('Additional Information')
                            ->columnSpan(2),
                    ]),
                Forms\Components\FileUpload::make('images')
                    ->label('Product Images')
                    ->multiple()
                    ->preserveFilenames()
                    ->directory('product-images')
                    ->disk('public')
                    ->columnSpan(2),
                Forms\Components\Repeater::make('custom_attributes')
                    ->label('Custom Attributes')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required(),

                        Forms\Components\Select::make('type')
                            ->label('Type')
                            ->live()
                            ->options([
                                'select' => 'Select',
                                'checkbox' => 'Checkbox',
                                'fileInput' => 'File Input',
                            ])
                            ->reactive()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $set('value', null); // Ensures value is reset when type changes
                            }),
                        Forms\Components\TextInput::make('additional_info')
                            ->label('Additional Information')
                            ->visible(fn (Get $get): bool => $get('type') === 'select' || $get('type') === 'checkbox'),
                        Forms\Components\Checkbox::make('is_required')
                            ->label('Is required')
                            ->visible(fn (Get $get): bool => $get('type') === 'select' || $get('type') === 'fileInput'),

                        Forms\Components\FileUpload::make('fileInputImage')
                            ->label('Upload Image')
                            ->visible(fn (Get $get): bool => $get('type') === 'fileInput'),

                        Forms\Components\Repeater::make('options')
                            ->label('Options')
                            ->schema([
                                Forms\Components\TextInput::make('label')
                                    ->required()
                                    ->label('Label')
                                    ->columnSpan(1), // Set column span to half of the grid width
                                Forms\Components\TextInput::make('price')
                                    ->label('Price')
                                    ->numeric()
                                    ->prefix('CHF')
                                    ->nullable() // Make the price field optional
                                    ->columnSpan(1), // Make the price field optional
                                Forms\Components\TextInput::make('custom_info')
                                    ->label('Custom information')
                                    ->columnSpan(2),
                                Forms\Components\Checkbox::make('is_required')
                                    ->label('Is required')
                                    ->columnSpan(2)
                                    ->visible(fn (Get $get): bool => $get('type') === 'select'),
                            ])
                            ->collapsible()
                            ->reorderable()
                            ->columns(2)
                            ->visible(fn (Get $get): bool => $get('type') === 'select' || $get('type') === 'checkbox')
                            ->reactive()
                            ->createItemButtonLabel('Add Option'),
                    ])
                    ->grid(2)
                    ->collapsible()
                    ->columnSpan(2)
                    ->reorderable()
                    ->createItemButtonLabel('Add Custom Attribute'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('product_type')
                    ->color(fn (string $state): string => match ($state) {
                        'personal' => 'success',
                        'school' => 'primary',
                    })
                    ->badge()->searchable(),
                Tables\Columns\TextColumn::make('price')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->searchable()
                    ->label('Category'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->limit(20),
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
