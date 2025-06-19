<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\User;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
/*                FusedGroup::make([
                    Grid::make(3)
                        ->schema([
                            Select::make('country')
                                ->hiddenLabel()
                                ->placeholder('Country')
                                ->prefix('Country')
                                ->options([
                                    // ...
                                ]),
                            Select::make('state')
                                ->hiddenLabel()
                                ->placeholder('State')
                                ->prefix('State')
                                ->options([
                                    // ...
                                ]),
                            Select::make('city')
                                ->hiddenLabel()
                                ->placeholder('City')
                                ->prefix('City')
                                ->options([
                                    // ...
                                ])
                                ->options([
                                    // ...
                                ]),

                        ]),
                    TextInput::make('name')
                        ->prefix('Name')
                        ->required(),
                    TextInput::make('email')
                        ->email()
                        ->required(),
                    DateTimePicker::make('email_verified_at')
                        ->label('Email Verified At')
                        ->prefix('Email')
                        ->placeholder('Email Verified At'),
                    TextInput::make('password')
                        ->password()
                        ->required(),
                    TextInput::make('city')
                        ->placeholder('City'),
                    Select::make('country')
                        ->placeholder('Country')
                        ->options([
                            // ...
                        ]),

                ])->columnSpanFull()*/


            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('email_verified_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageUsers::route('/'),
        ];
    }
}
