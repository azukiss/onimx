<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

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

    public function AccountPreferences(Request $request)
    {
        return view('user.account', [
            'page_id' => $this->page_id . ' account',
        ]);
    }

    protected function UpdateAvatar(Request $request)
    {
//        dd($request->avatar);
//        dd(public_path('uploads/avatar/'));

        if ($request->save == true) {
            $request->validate([
                'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            ]);

            DB::transaction(function () use ($request) {
                $user = auth()->user();

                if ($request->hasfile('avatar')) {
                    if (!empty($user->avatar)) {
                        File::delete(public_path('uploads/avatar/' . $user->avatar));
                    }

                    $img = Image::make($request->file('avatar'));

                    $img->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    $avatarName = $user->id . '_' . time() . '.' . $request->file('avatar')->extension();
                    $img->save(public_path('uploads/avatar/' . $avatarName));
                    $img->destroy();
                } else {
                    $avatarName = $user->avatar;
                }

                User::where('id', $user->id)->update([
                    'avatar' => $avatarName,
                ]);
            });
            Alert::toast('Successful', 'success');
        }
        elseif ($request->remove == true)
        {
            DB::transaction(function () use ($request) {
                $user = auth()->user();

                if (!empty($user->avatar)) {
                    File::delete(public_path('uploads/avatar/' . $user->avatar));
                }

                $avatarName = null;

                User::where('id', $user->id)->update([
                    'avatar' => $avatarName,
                ]);
            });
            Alert::toast('Successful', 'success');
        }
        else {
            Alert::toast('Something Invalid', 'error');
        }

        return redirect()->route('user.settings.account');
    }
}
