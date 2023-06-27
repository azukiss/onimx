<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilamentLoginController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('login');
    }
}
