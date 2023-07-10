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
        if ($post->is_nsfw)
        {
            if (!auth()->check() || auth()->user()->cannot('view-nsfw-post'))
            {
                return abort(404);
            }
        }

//        if (auth()->user()->cannot('no-short-link'))
//        {
//            $slink = new \AshAllenDesign\ShortURL\Classes\Builder();
//
//            $dlinks = array();
//            foreach (array_values($post->link) as $link)
//            {
//                $shortURLObject = $slink->destinationUrl(array_values($link)[0])->make();
//                $shortURL = $shortURLObject->default_short_url;
//                array_push($dlinks, $shortURL);
//            }
//        }
//        else
//        {
//            foreach (array_values($post->link) as $link)
//            {
//                array_push($dlinks, array_values($link)[0]);
//            }
//        }

        return view('post.page', [
            'page_title' => $post->title,
            'page_id' => $this->page_id,
            'post' => $post,
//            'dlinks' => $dlinks,
        ]);
    }

    public function postWithoutSLug(Post $post)
    {
        return redirect()->route('post.page', [$post->id, $post->slug]);
    }
}
