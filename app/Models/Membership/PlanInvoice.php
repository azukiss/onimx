<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanInvoice extends Model
{
    use SoftDeletes;

    public $fillable = [
        'code',
        'user_id',
        'plan_id',
        'payment_id',
        'proof',
    ];

    public $casts = [
        'code' => 'string',
        'user_id' => 'integer',
        'plan_id' => 'integer',
        'payment_id' => 'integer',
        'proof' => 'array',
    ];
}
