<?php

namespace App\Models\Membership;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
//    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'code',
        'name',
        'price',
        'currency',
        'currency_code',
        'stock',
        'length',
        'order',
        'is_active',
    ];

    public $casts = [
        'code' => 'string',
        'name' => 'string',
        'price' => 'integer',
        'currency' => 'string',
        'stock' => 'integer',
        'length' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'name', 'slug');
    }
}
