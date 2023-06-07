<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\SettingsController as SettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require_once __DIR__ . '/fortify.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::name('user')->group(function () {
    Route::controller(SettingsController::class)->name('.settings')->group(function () {
        Route::get('/settings', 'index')->name('.index');
        Route::get('/settings/2fa', 'TwoFactor')->name('.2fa');
        Route::get('/settings/2fa/enable', function () { return abort(404); });
        Route::get('/settings/2fa/confirm', function () { return abort(404); });
        Route::get('/settings/2fa/disable', function () { return abort(404); });
        Route::get('/settings/password', 'ChangePassword')->name('.password');
        Route::get('/settings/account', 'AccountPreferences')->name('.account');
    });
});
