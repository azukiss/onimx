<?php

namespace App\Enum\PlanInvoice;

use App\Enum\Traits\EnumToArray;

enum StatusEnum: string
{
    use EnumToArray;

    case Paid = 'Paid';
    case Unpaid = 'Unpaid';
    case Pending = 'Pending';
    case Cancelled = 'Cancelled';
    case Partial = 'Partial';
}
