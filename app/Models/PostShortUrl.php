<?php

namespace App\Models;

use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostShortUrl extends Model
{
    protected $fillable = [
        'post_id',
        'url_key',
    ];

    protected static function booted () {
        static::deleting(function(PostShortUrl $postShortUrl) {
            ShortURL::findByKey($postShortUrl->url_key)->delete();
        });
    }

    public function short_url(): HasOne
    {
        return $this->hasOne(ShortURL::class, 'url_key', 'url_key');
    }
}
