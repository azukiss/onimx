<?php

namespace App\Models\Membership;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanFeature extends Model
{
//    use HasFactory;
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
        'type' => 'string',
        'value' => 'string',
        'order' => 'integer',
    ];

    public function plans(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id')->orderBy('order');
    }
}
