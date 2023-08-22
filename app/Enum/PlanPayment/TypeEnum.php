<?php

namespace App\Enum\PlanPayment;

use App\Enum\Traits\EnumToArray;

enum TypeEnum: string
{
    use EnumToArray;

    case ewallet = 'E-Wallet';
    case bank = 'Bank Transfer';
    case va = 'Bank Virtual Account';
    case crypto = 'Crypto Currency';
    case paypal = 'PayPal';
    case googleplay = 'Google Play Card';
    case steamwallet = 'Steam Wallet Code';
}
