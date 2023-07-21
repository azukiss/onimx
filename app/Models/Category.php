<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'slug',
    ];

    public $casts = [
        'name' => 'string',
        'slug' => 'string',
    ];

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'cat_id', 'id');
    }
}
