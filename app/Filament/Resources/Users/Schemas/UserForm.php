<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Country;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Repeater::make('countries')
                    ->label('Countries')
                    ->schema([
                        Select::make('country')
                            ->label('Country')
                            ->options(Country::class)
                            ->required()
                            ->searchable()
                            ->placeholder('Select a country'),
                    ])
                    ->columnSpanFull()
                    ->inlineLabel(),
            ]);
    }
}
