<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
//    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'code',
        'description',
        'info',
        'link',
        'image',
        'is_nsfw',
        'is_published',
    ];

    protected $casts = [
        'author_id' => 'integer',
        'info' => 'array',
        'link' => 'array',
        'image' => 'array',
        'is_nsfw' => 'bool',
        'is_published' => 'bool',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->orderBy('order', 'asc');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
