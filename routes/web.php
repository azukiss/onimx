<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\HomeController as HomeController;
use App\Http\Controllers\User\SettingsController as SettingsController;
use App\Http\Controllers\Post\PageController as PostPageController;
use App\Http\Controllers\Post\ShortLinkController as ShortLinkController;

require_once __DIR__ . '/fortify.php';

Route::get('/logout', function () {
    return abort(403);
});

Route::controller(HomeController::class)->name('page')->group(function () {
    Route::get('/', 'welcome')->name('.welcome');
    Route::get('/home', 'home')->name('.home');
});

Route::name('user')->group(function () {
    Route::controller(SettingsController::class)->prefix('/settings')->name('.settings')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/2fa', 'TwoFactor')->name('.2fa');
        Route::get('/2fa/enable', function () { return abort(404); });
        Route::get('/2fa/confirm', function () { return abort(404); });
        Route::get('/2fa/disable', function () { return abort(404); });
        Route::get('/password', 'ChangePassword')->name('.password');
        Route::get('/account', 'AccountPreferences')->name('.account');
        Route::get('/avatar', function () { return abort(404); });
        Route::put('/avatar', 'UpdateAvatar')->name('.avatar');
    });
});

Route::controller(PostPageController::class)->prefix('/post')->name('post')->group(function () {
    Route::get('/{post:id}-{slug}', 'post')->name('.page');
    Route::get('/{post:id}', 'postWithoutSLug');
});

Route::controller(ShortLinkController::class)->name('shortlink')->group(function () {
    Route::get('/{base64}', 'dlink')->prefix('/dl')->name('.download');
});
