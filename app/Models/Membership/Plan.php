<?php

namespace App\Models\Membership;

use App\Enum\Plan\CurrencyEnum;
use App\Enum\Plan\LocaleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'price',
        'currency',
        'locale',
        'length',
        'order',
        'is_active',
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'price' => 'integer',
        'currency' => CurrencyEnum::class,
        'locale' => LocaleEnum::class,
        'length' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(PlanFeature::class,'plan_id', 'id')->orderBy('order');
    }
}
