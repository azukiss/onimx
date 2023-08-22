<?php

namespace App\Enum\PlanInvoice;

use App\Enum\Traits\EnumToArray;

enum StatusBadgeEnum: string
{
    use EnumToArray;

    case scooter = 'Paid';
    case oni = 'Unpaid';
    case indigo = 'Pending';
    case gray = 'Cancelled';
    case yellow = 'Partial';
}
