<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private $page_id = 'post-page';

    public function __construct()
    {
        //
    }

    public function post(Post $post)
    {
        if ($post->is_nsfw == true)
        {
            if (!auth()->check() || auth()->user()->cannot('view-nsfw-post'))
            {
                return abort(404);
            }
        }

        return view('post.page', [
            'page_title' => $post->title,
            'page_id' => $this->page_id,
            'post' => $post,
        ]);
    }

    public function postWithoutSLug(Post $post)
    {
        return redirect()->route('post.page', [$post->id, $post->slug]);
    }
}
