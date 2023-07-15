<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Models\ShortURL;

class PageController extends Controller
{
    private $page_id = 'post-page';

    public function __construct()
    {
        //
    }

    public function post(Post $post)
    {
        if ($post->is_nsfw)
        {
            if (!auth()->check() || auth()->user()->cannot('view-nsfw-post'))
            {
                return abort(404);
            }
        }

        $urls = [];
        foreach ($post->postShortUrls as $link)
        {
            array_push($urls, $link->url_key);

            $links = ShortURL::select('default_short_url')->whereIn('url_key', $urls)->get();
        }

//        dd($links);

        return view('post.page', [
            'page_title' => $post->title,
            'page_id' => $this->page_id,
            'post' => $post,
            'links' => $links,
        ]);
    }

    public function postWithoutSLug(Post $post)
    {
        return redirect()->route('post.page', [$post->id, $post->slug]);
    }
}
