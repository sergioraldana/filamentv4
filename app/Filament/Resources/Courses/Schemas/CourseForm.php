<?php

namespace App\Filament\Resources\Courses\Schemas;

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
                    ->inlineLabel(),
            ]);
    }
}
