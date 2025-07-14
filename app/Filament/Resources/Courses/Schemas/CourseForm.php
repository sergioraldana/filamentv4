<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Enums\Country;
use App\Filament\Resources\Courses\Components\SelectField;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->inlineLabel()
                    ->schema([
                        TextInput::make('name')
                            ->label('Course Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->label('Description')
                            ->maxLength(500),
                        Select::make('instructor_id')
                            ->label('Instructor')
                            ->relationship('instructor', 'name')
                            ->required(),
                        FusedGroup::make([
                            DateTimePicker::make('start_date')
                                ->label('Start Date')
                                ->required(),
                            DateTimePicker::make('end_date')
                                ->label('End Date')
                                ->required(),
                        ])
                            ->label('Course Schedule')
                            ->columns(2)
                            ->columnSpanFull()
                            ->inlineLabel(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'completed' => 'Completed',
                            ])
                            ->default('active')
                            ->required(),
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
                    ]),

            ]);
    }
}
