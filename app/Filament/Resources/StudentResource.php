<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name'),
                \Filament\Forms\Components\DatePicker::make('birth_date')
                    ->required()
                    ->label('Birth Date'),
                \Filament\Forms\Components\Select::make('institution_id')
                    ->relationship('institution', 'name')
                    ->required()
                    ->searchable()
                    ->label('Institution'),
                \Filament\Forms\Components\Repeater::make('student_photos')
                    ->relationship('photos')
                    ->schema([
                        \Filament\Forms\Components\FileUpload::make('photo_path')
                            ->image()
                            ->label('Photo'),
                    ])
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('birth_date')->label('Birth Date')->searchable(),
                Tables\Columns\TextColumn::make('institution.name')->label('Institution Name')->searchable(),
                Tables\Columns\BadgeColumn::make('photos_count')
                    ->sortable()
                    ->label('Has Photos')
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Yes' : 'No';
                    })
                    ->colors([
                        'success' => fn ($state) => $state,
                        'danger' => fn ($state) => ! $state,
                    ])
                    ->counts('photos'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
