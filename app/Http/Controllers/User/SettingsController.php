<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private $page_id = 'settings-page';

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return redirect()->route('user.settings.account');
    }

    public function TwoFactor()
    {
        return view('user.two-factor', [
            'page_id' => $this->page_id . ' 2fa',
        ]);
    }

    public function ChangePassword()
    {
        return view('user.password', [
            'page_id' => $this->page_id . ' password',
        ]);
    }

    public function AccountPreferences()
    {
        return view('user.account', [
            'page_id' => $this->page_id . ' account',
        ]);
    }
}
