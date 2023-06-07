<?php

namespace App\Http\Controllers\User\TwoFactor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Laravel\Fortify\Contracts\RecoveryCodesGeneratedResponse;
use RealRashid\SweetAlert\Facades\Alert;

class RecoveryCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:two-factor');
    }

    public function store(Request $request, GenerateNewRecoveryCodes $generate)
    {
        if (!empty(auth()->user()->two_factor_confirmed_at))
        {
            $generate($request->user());

            $codes = null;
            foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code) {
                $codes .= '<div>' . $code . '</div>';
            }

            Alert::html('Recovery Code', '<code>' . $codes . '</code>')->autoClose(60000);
            return app(RecoveryCodesGeneratedResponse::class);
        }
        else
        {
            Alert::toast('Error', 'Something Invalid');
            return redirect()->route('user.settings.2fa');
        }
    }

    public function show()
    {
        if (!empty(auth()->user()->two_factor_confirmed_at))
        {
            $codes = null;
            foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code) {
                $codes .= '<div>' . $code . '</div>';
            }

            Alert::html('Recovery Code', '<code>' . $codes . '</code>')->autoClose(60000);
        }
        else
        {
            Alert::toast('Something Invalid', 'error');
        }

        return redirect()->route('user.settings.2fa');
    }
}
