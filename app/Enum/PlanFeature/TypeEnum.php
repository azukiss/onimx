<?php

namespace App\Enum\PlanFeature;

use App\Enum\Traits\EnumToArray;

enum TypeEnum: string
{
    use EnumToArray;

    case String = 'String';
    case Boolean = 'Boolean';
    case Icon = 'Icon';
}
