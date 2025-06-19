<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Country: string implements HasLabel
{
    case Afghanistan = 'AF';
    case Albania = 'AL';
    case Algeria = 'DZ';
    case Andorra = 'AD';
    case Angola = 'AO';
    case AntiguaAndBarbuda = 'AG';
    case Argentina = 'AR';
    case Armenia = 'AM';
    case Australia = 'AU';
    case Austria = 'AT';
    case Azerbaijan = 'AZ';
    // Add more countries as needed

    public function getLabel(): string
    {
        return match ($this) {
            self::Afghanistan => 'Afghanistan',
            self::Albania => 'Albania',
            self::Algeria => 'Algeria',
            self::Andorra => 'Andorra',
            self::Angola => 'Angola',
            self::AntiguaAndBarbuda => 'Antigua and Barbuda',
            self::Argentina => 'Argentina',
            self::Armenia => 'Armenia',
            self::Australia => 'Australia',
            self::Austria => 'Austria',
            self::Azerbaijan => 'Azerbaijan',
        };
    }

}
