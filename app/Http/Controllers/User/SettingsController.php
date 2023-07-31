<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class SettingsController extends Controller
{
    private $page_title = 'Settings ';
    private $page_id = 'settings-page ';

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
            'page_title' => $this->page_title . 'Two Factor',
            'page_id' => $this->page_id . '2fa',
        ]);
    }

    public function ChangePassword()
    {
        return view('user.password', [
            'page_title' => $this->page_title . 'Password',
            'page_id' => $this->page_id . 'password',
        ]);
    }

    public function AccountPreferences(Request $request)
    {
        return view('user.account', [
            'page_title' => $this->page_title . 'Account',
            'page_id' => $this->page_id . 'account',
        ]);
    }

    protected function UpdateAvatar(Request $request)
    {
        if ($request->save == true) {
            $request->validate([
                'avatar' => ['required', 'image', 'dimensions:max_width=2048,max_height=2048'],
            ]);

            DB::transaction(function () use ($request) {
                $user = auth()->user();

                if ($request->hasfile('avatar')) {
                    if (!empty($user->avatar)) {
                        File::delete(public_path($user->avatar));
                    }

                    $img = Image::make($request->file('avatar'));

                    $img->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    $avatarName = 'uploads/avatar/' . bin2hex(random_bytes(10)) . '.' . $request->file('avatar')->extension();

                    Storage::disk(config('filesystems.default'))->put($avatarName, $img->stream());

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
                    Storage::disk(config('filesystems.default'))->delete($user->avatar);
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
