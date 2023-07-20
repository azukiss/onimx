<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $page_id = '-page';

    public function __construct()
    {

    }

    public function welcome()
    {
        return redirect()->route('page.home');
    }

    public function home()
    {
        $post = Post::select(['id', 'author_id', 'title', 'slug', 'code', 'image', 'is_nsfw', 'created_at']);

        if (auth()->check() && auth()->user()->can('view-nsfw-post'))
        {
            $post = $post->where('is_nsfw', true);
        }
        else
        {
            $post = $post->where('is_nsfw', false);
        }

        if (auth()->check() && auth()->user()->can('view-any-posts'))
        {
            $post = $post->where('is_published', true)
                        ->orWhere('is_published', false)
                        ->orWhereNull('deleted_at')
                        ->orWhereNotNull('deleted_at');
        }
        else
        {
            $post = $post->where('is_published', true)->whereNull('deleted_at');
        }

        return view('page.home', [
            'page_title' => 'Home',
            'page_id' => 'home' . $this->page_id,
            'posts' => $post->orderBy('created_at', 'desc')->paginate(20),
        ]);
    }
}
