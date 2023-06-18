<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    ];

    protected $casts = [
        'info' => 'array',
        'link' => 'array',
        'is_published' => 'bool',
        'image' => 'array',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

//    public function tags(): BelongsTo
//    {
//        return $this->belongsTo(Tag::class, 'post_tags', 'id', 'tag_id');
//    }
}
