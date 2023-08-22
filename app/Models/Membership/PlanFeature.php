<?php

namespace App\Models\Membership;

use App\Enum\PlanFeature\TypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanFeature extends Model
{
    Use SoftDeletes;

    protected $fillable = [
        'plan_id',
        'name',
        'description',
        'type',
        'value',
        'order',
    ];

    protected $casts = [
        'plan_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'type' => TypeEnum::class,
        'value' => 'string',
        'order' => 'integer',
    ];

    public function plans(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id')->orderBy('order');
    }
}
