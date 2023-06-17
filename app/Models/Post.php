<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
//    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'main-tag',
        'sub-tag',
        'code',
        'description',
        'info',
        'link',
    ];

    protected $casts = [
        'sub-tag' => 'array',
        'info' => 'array',
        'link' => 'array',
    ];
}
