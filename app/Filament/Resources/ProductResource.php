<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Form;
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
                    ->inline(false),
                TagsInput::make('tags')->separator(',')->columnSpan(2),
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
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('product_type')->searchable(),
                Tables\Columns\TextColumn::make('price')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->searchable(),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable()
                    ->badge()->separator(','),
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
