<?php

namespace App\Models\Membership;

use App\Enum\PlanPayment\TypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanPayment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'type',
        'address',
        'used',
        'is_active',
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'type' => TypeEnum::class,
        'address' => 'string',
        'is_active' => 'boolean',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
