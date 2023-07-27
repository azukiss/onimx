<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanPayment extends Model
{
//    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'type',
        'number',
        'used',
    ];

    public $casts = [
        'type' => 'string',
        'number' => 'string',
        'used' => 'integer',
    ];
}
