<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $page_id = '-page';

    public function welcome()
    {
        return redirect()->route('page.home');
    }

    public function home()
    {
        return view('page.home', [
            'page_title' => 'Home',
            'page_id' => 'home' . $this->page_id,
        ]);
    }
}
