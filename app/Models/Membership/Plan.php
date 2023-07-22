<?php

namespace App\Models\Membership;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
//    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'code',
        'name',
        'slug',
        'description',
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
        'slug' => 'string',
        'description' => 'string',
        'price' => 'integer',
        'currency' => 'string',
        'currency_code' => 'string',
        'stock' => 'integer',
        'length' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];
}
