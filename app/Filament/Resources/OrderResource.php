<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRelationManagerResource\RelationManagers\ContactsRelationManager;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
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
                    ->options(['pending', 'completed']),
                TextInput::make('invoice.id')
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
                    ->collapsed(false)  // Changed to false to make the collapsible open by default
                    ->addable(false)
                    ->schema([
                        TextInput::make('address')->nullable(),
                        TextInput::make('zip')->nullable(),
                        TextInput::make('city')->nullable(),
                        TextInput::make('country')->nullable(),
                        TextInput::make('region')->nullable(),
                    ]),

                Repeater::make('shipping_address')
                    ->collapsed()
                    ->addable(false)
                    ->schema([
                        TextInput::make('address')->nullable(),
                        TextInput::make('zip')->nullable(),
                        TextInput::make('city')->nullable(),
                        TextInput::make('country')->nullable(),
                        TextInput::make('region')->nullable(),
                    ]),

                Repeater::make('items')
                    ->relationship('items')
                    ->collapsible()
                    ->collapsed(false)
                    ->grid()
                    ->columnSpanFull()
                    ->addable(false)
                    ->schema([
                        Select::make('product_id')
                            ->relationship('product', 'name')
                            ->disabled(true),
                        Grid::make()
                            ->columns()
                            ->schema([
                                TextInput::make('quantity')
                                    ->columnSpan(1)
                                    ->disabled(true),
                                TextInput::make('price')
                                    ->columnSpan(1)
                                    ->prefix('CHF')
                                    ->disabled(true),
                            ]),
                        Grid::make()
                            ->columns(1)
                            ->schema(function ($record) {
                                $options = $record->options ?? [];
                                $checkboxes = [];
                                foreach ($options['checkbox'] as $groupKey => $groupValues) {
                                    foreach ($groupValues as $key => $value) {
                                        $checkboxes[] = Checkbox::make("options.checkbox.$groupKey.$key")
                                            ->label($key)
                                            ->disabled(true)
                                            ->default($value);
                                    }
                                }

                                $files = [];
                                foreach ($options['files'] as $key => $value) {
                                    $files[] = FileUpload::make("options.files.$key")
                                        ->disk('public')
                                        ->label($key)
                                        ->downloadable()
                                        ->disabled(true)
                                        ->required();
                                }

                                $selects = [];
                                foreach ($options['selects'] as $key => $value) {
                                    $selects[] = Select::make("options.selects.$key")
                                        ->label($key)
                                        ->options([$key => $value])
                                        ->disabled(true)
                                        ->required();
                                }

                                return array_merge($checkboxes, $files, $selects);
                            }),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('contact.name')
                    ->searchable()
                    ->label('Contact Name'),
                TextColumn::make('contact.email')
                    ->label('Contact Email')
                    ->searchable()
                    ->url(fn ($record) => 'mailto:'.$record->contact->email)
                    ->openUrlInNewTab(),
                TextColumn::make('amount')
                    ->sortable()
                    ->searchable()
                    ->money('CHF'),
                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->sortable()
                    ->badge(function (Order $record) {
                        return $record->status;
                    })
                    ->colors([
                        'success' => 'paid',
                        'danger' => 'unpaid',
                    ]),

                TextColumn::make('payment_method')
                    ->sortable()
                    ->label('Payment Method')
                    ->badge(function (Order $record) {
                        return $record->payment_method;
                    })
                    ->colors([
                        'success' => 'card',
                        'info' => 'bank_transfer',
                    ]),
                TextColumn::make('Invoice.id')
                    ->searchable()
                    ->openUrlInNewTab()
                    ->label('Invoice'),
                TextColumn::make('contact.phone')
                    ->searchable()
                    ->label('Contact Phone')
                    ->url(fn ($record) => 'tel:'.$record->contact->phone)
                    ->openUrlInNewTab(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_method')
                    ->options([
                        'card' => 'Card',
                        'bank_transfer' => 'Bank Transfer',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                    ]),

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
