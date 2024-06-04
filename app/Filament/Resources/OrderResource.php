<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRelationManagerResource\RelationManagers\ContactsRelationManager;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Fieldset;
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
                    ->options(['pending' => 'pending', 'completed' => 'completed']),
                TextInput::make('id')
                    ->label('Order ID')
                    ->disabled()
                    ->default(fn ($record) => $record->id),
                Select::make('payment_method')
                    ->options(['card' => 'card', 'bank_transfer' => 'bank_transfer'])
                    ->native(false)
                    ->required(),
                Select::make('payment_status')
                    ->options(['paid' => 'paid', 'unpaid' => 'unpaid'])
                    ->native(false)
                    ->required(),
                TextInput::make('comment')
                    ->label('Order Comment')
                    ->nullable()
                    ->columnSpanFull(),
                Toggle::make('address_same_as_billing')
                    ->live()
                    ->default(true)
                    ->columnSpanFull()
                    ->label('Shipping address same as billing'),
                Fieldset::make('Billing Address')
                    ->schema([
                        TextInput::make('billing_address.address')->label('Billing Address')->nullable(),
                        TextInput::make('billing_address.zip')->label('Billing Zip')->nullable(),
                        TextInput::make('billing_address.city')->label('Billing City')->nullable(),
                        TextInput::make('billing_address.country')->label('Billing Country')->nullable(),
                        TextInput::make('billing_address.region')->label('Billing Region')->nullable(),
                    ]),
                Fieldset::make('Shipping Address')
                    ->schema([
                        TextInput::make('shipping_address.address')->label('Shipping Address')->nullable(),
                        TextInput::make('shipping_address.zip')->label('Shipping Zip')->nullable(),
                        TextInput::make('shipping_address.city')->label('Shipping City')->nullable(),
                        TextInput::make('shipping_address.country')->label('Shipping Country')->nullable(),
                        TextInput::make('shipping_address.region')->label('Shipping Region')->nullable(),
                    ])
                    ->hidden(fn ($get) => $get('address_same_as_billing')),
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
                                if (isset($options['checkbox'])) {
                                    foreach ($options['checkbox'] as $groupKey => $groupValues) {
                                        foreach ($groupValues as $key => $value) {
                                            $checkboxes[] = Checkbox::make("options.checkbox.$groupKey.$key")
                                                ->label($key)
                                                ->disabled(true)
                                                ->default($value);
                                        }
                                    }
                                }

                                $files = [];
                                if (isset($options['files'])) {
                                    foreach ($options['files'] as $key => $value) {
                                        $files[] = FileUpload::make("options.files.$key")
                                            ->disk('public')
                                            ->label($key)
                                            ->optimize('webp')
                                            ->downloadable()
                                            ->disabled(true)
                                            ->required();
                                    }
                                }

                                $selects = [];
                                if (isset($options['selects'])) {
                                    foreach ($options['selects'] as $key => $value) {
                                        $selects[] = Select::make("options.selects.$key")
                                            ->label($key)
                                            ->options([$key => $value])
                                            ->disabled(true)
                                            ->required();
                                    }
                                }

                                return array_merge($checkboxes, $files, $selects);
                            }),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
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
                TextColumn::make('invoices.id')
                    ->searchable()
                    ->formatStateUsing(function ($record) {
                        return $record->invoices->first()->id ?? 'No Invoice';
                    })
                    ->openUrlInNewTab()
                    ->label('Invoice'),
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
