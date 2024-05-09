<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Customer';

    protected static ?string $navigationIcon = 'heroicon-c-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('uuid'),
                TextInput::make('amount'),
                TextInput::make('status'),
                TextInput::make('invoice'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('uuid'),
                Tables\Columns\TextColumn::make('amount')->money('usd'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('time')->dateTime(),
                Tables\Columns\TextColumn::make('invoice'),
                Tables\Columns\TextColumn::make('contact.name')->label('Contact Name'),
                Tables\Columns\TextColumn::make('contact.email')->label('Contact Email'),
                Tables\Columns\TextColumn::make('contact.phone')->label('Contact Phone'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}