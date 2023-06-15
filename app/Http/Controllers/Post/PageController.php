<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $page_id = 'post-page';

    public function cosplay()
    {
        return view('post.page', [
            'page_title' => 'Cosplayer Name - Cosplay Title',
            'page_id' => $this->page_id,
            'code_collection' => 'ONI0001',
        ]);
    }
}
