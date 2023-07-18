<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    private $page_id = 'short-link';

    public function dlink($base64)
    {
        $url_key = base64_decode($base64);
        $direct = ShortURL::findByKey($url_key)->destination_url;

        if (auth()->check() && auth()->user()->can('skip-short-link'))
        {
            return redirect()->away($direct);
        }

        return view('page.shortlink', [
            'page_title' => 'Short Link - '. $url_key,
            'page_id' => $this->page_id . ' ' . $url_key,
            'link' => $direct,
        ]);
    }
}
