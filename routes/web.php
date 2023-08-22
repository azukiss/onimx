<?php

use App\Http\Controllers\Invoice\UpgradeInvoiceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Page\HomeController as HomeController;
use App\Http\Controllers\Page\InvoiceController as InvoiceController;
use App\Http\Controllers\Page\UpgradeController as UpgradeController;

use App\Http\Controllers\User\SettingsController as SettingsController;

use App\Http\Controllers\Post\PageController as PostPageController;
use App\Http\Controllers\Post\ShortLinkController as ShortLinkController;
use App\Http\Controllers\Post\TagController as TagController;



require_once __DIR__ . '/fortify.php';

Route::get('/logout', function () {
    return abort(403);
});

Route::name('page')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'welcome')->name('.welcome');
        Route::get('/home', 'home')->name('.home');
    });

    Route::controller(UpgradeController::class)->prefix('/upgrade')->name('.upgrade')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/order/{plan:code}', 'payment')->name('.payment');
        Route::post('/order/{plan:code}', 'makeInvoice');
    });

    Route::controller(InvoiceController::class)->prefix('/invoice')->name('.invoice')->group(function () {
        Route::get('/', 'index')->name('.index');

        Route::controller(UpgradeInvoiceController::class)->prefix('/upgrade')->name('.upgrade')->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/{planInvoice:code}', 'show')->name('.show');
            Route::post('/{planInvoice:code}', 'proofUpload')->name('.proof.upload');
            Route::delete('/{planInvoice:code}/proof/{planInvoiceProof}/remove', 'proofRemove')->name('.proof.remove');
            Route::get('/{planInvoice:code}/proof/{key}/download', 'proofDownload')->name('.proof.download');
        });
    });
});

Route::name('user')->group(function () {
    Route::controller(SettingsController::class)->prefix('/settings')->name('.settings')->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/2fa', 'TwoFactor')->name('.2fa');
        // Route::get('/2fa/enable', function () { return abort(404); });
        // Route::get('/2fa/confirm', function () { return abort(404); });
        // Route::get('/2fa/disable', function () { return abort(404); });
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
    Route::get('/dl/{base64}', 'dlink')->name('.download');
});

Route::controller(TagController::class)->name('tag')->group(function () {
    Route::get('/tags', 'index')->name('.index');
    Route::get('/tag/{tag:slug}', 'show')->name('.show');
    Route::get('/tag/archive/{tag:slug}', 'archive')->name('.archive');
});
