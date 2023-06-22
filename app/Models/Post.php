<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
//    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'code',
        'description',
        'info',
        'link',
        'is_published',
        'image',
        'author_id',
    ];

    protected $casts = [
        'info' => 'array',
        'link' => 'array',
        'is_published' => 'bool',
        'image' => 'array',
        'author_id' => 'integer',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->orderBy('order', 'asc');
    }

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'author_id', 'id');
    }
}
