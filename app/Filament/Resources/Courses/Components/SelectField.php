<?php

namespace App\Filament\Resources\Courses\Components;

use Filament\Forms\Components\Select;

class SelectField
{

    public static function getField(): Select
    {
        return Select::make('status')
            ->label('Status')
            ->options([
                'active' => 'Active',
                'inactive' => 'Inactive',
                'archived' => 'Archived',
            ]
            )
            ->default('active')
            ->required();
    }

}
