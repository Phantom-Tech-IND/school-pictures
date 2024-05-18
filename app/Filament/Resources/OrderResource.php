<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRelationManagerResource\RelationManagers\ContactsRelationManager;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Customer';

    protected static ?string $navigationIcon = 'heroicon-c-shopping-bag';

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::count();

        return $count > 100 ? '100+' : (string) $count;
    }

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
                TextColumn::make('contact.name')
                    ->label('Contact Name'),
                TextColumn::make('contact.email')
                    ->label('Contact Email')
                    ->url(fn ($record) => 'mailto:'.$record->contact->email)
                    ->openUrlInNewTab(),
                TextColumn::make('time')
                    ->dateTime()
                    ->date('d M Y'),
                TextColumn::make('amount')
                    ->money('CHF'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge(function (Order $record) {
                        return $record->status;
                    })
                    ->colors([
                        'success' => 'completed',
                        'danger' => 'cancelled',
                        'warning' => 'pending',
                        'info' => 'processing',
                    ]),
                TextColumn::make('invoice')
                    ->label('Invoice'),
                TextColumn::make('contact.phone')
                    ->label('Contact Phone')
                    ->url(fn ($record) => 'tel:'.$record->contact->phone)
                    ->openUrlInNewTab(),
            ])
            ->filters([
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
            ContactsRelationManager::class,
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
