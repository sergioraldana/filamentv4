<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Enums\Country;
use App\Filament\Resources\Courses\Components\SelectField;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FusedGroup::make([
                    TextInput::make('name')
                        ->label('Course Name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('description')
                        ->label('Description')
                        ->nullable()
                        ->maxLength(500),

                ])->label('Course details')
                    ->columnSpanFull()
                    ->inlineLabel(),
                FusedGroup::make([
                    DateTimePicker::make('start_date')
                        ->label('Start Date')
                        ->prefix('Start date')
                        ->date()
                        ->required(),
                    DateTimePicker::make('end_date')
                        ->label('End Date')
                        ->prefix('End date')
                        ->date()
                        ->required(),
                    Select::make('status')
                        ->label('Status')
                        ->columnSpanFull()
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                            'completed' => 'Completed',
                        ])
                        ->default('active')
                        ->prefix('Status')
                        ->required(),
                ])->label('Course Schedule')
                    ->columns(2)
                    ->columnSpanFull()
                    ->inlineLabel(),
                Repeater::make('countries')
                    ->label('Countries')
                    ->schema([
                        Select::make('country')
                            ->label('Country')
                            ->options(Country::class)
                            ->multiple()
                            ->required()
                            ->searchable()
                            ->placeholder('Select a country'),
                    ])
                    ->columnSpanFull()
                    ->inlineLabel(),
                Repeater::make('students')
                    ->label('Enrolled Students')
                    ->schema([
                        TextInput::make('name')
                            ->label('Student Name')
                            ->required()
                            ->maxLength(255),
                        SelectField::getField(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
