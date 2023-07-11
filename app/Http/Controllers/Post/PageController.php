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

        $links = [];
        if (auth()->user()->cannot('no-short-link'))
        {
            foreach (array_values($post->link) as $link)
            {
                array_push($links, url(config('short-url.prefix').'/'.$link['url_key']));

            }
        }
        else
        {
            foreach (array_values($post->link) as $link)
            {
                array_push($links, $link['link']);
            }
        }

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
