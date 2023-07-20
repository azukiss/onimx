<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private string $page_title = 'Tag';
    private string $page_id = 'tag';

    public function index()
    {
        //
    }

    public function show(Tag $tag)
    {
        return view('post.list-by-tag', [
            'page_title' => $this->page_title . ' ' . $tag->name,
            'page_id' => $this->page_id . '-' . $tag->slug,
            'tag' => $tag,
            'posts' => $tag->posts()->select(['id', 'author_id', 'title', 'slug', 'code', 'image', 'is_nsfw', 'created_at'])->paginate(20),
        ]);
    }

    public function archive()
    {
        //
    }
}
