<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRelationManagerResource\RelationManagers\ContactsRelationManager;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
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
                Select::make('contact_id')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->relationship('contact', 'name'),
                TextInput::make('amount')->prefix('CHF')->required(),
                Select::make('status')
                    ->default('pending')
                    ->required()
                    ->native(false)
                    ->options(['pending', 'completed', 'cancelled']),
                TextInput::make('invoice')
                    ->prefix('id'),

                Select::make('payment_method')
                    ->options(['card', 'bank_transfer'])
                    ->native(false)
                    ->required(),
                Select::make('payment_status')
                    ->options(['paid', 'unpaid'])
                    ->native(false)
                    ->required(),
                Toggle::make('address_same_as_billing')
                    ->live()
                    ->default(true)
                    ->columnSpanFull()
                    ->label('Shipping address same as billing'),
                Repeater::make('billing_address')
                    ->collapsed()
                    ->addable(false)
                    ->schema([
                        TextInput::make('street')->required(),
                        TextInput::make('zip')->required(),
                        TextInput::make('city')->required(),
                        TextInput::make('country')->required(),
                    ]),

                Repeater::make('shipping_address')
                    ->collapsed()
                    ->addable(false)
                    ->schema([
                        TextInput::make('street')->required(),
                        TextInput::make('zip')->required(),
                        TextInput::make('city')->required(),
                        TextInput::make('country')->required(),
                    ])->hidden(fn (Get $get) => $get('address_same_as_billing') === true),
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
