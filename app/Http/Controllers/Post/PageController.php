<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $page_id = 'post-page';

    public function post(Post $post)
    {
//        dd(array_values($post->link));
        return view('post.page', [
            'page_title' => $post->title,
            'page_id' => $this->page_id,
            'post' => $post,
        ]);
    }
}
