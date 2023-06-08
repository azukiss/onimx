<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'), ['icon' => 'fa-solid fa-home', 'color' => 'text-gray-500']);
});

// Error 404
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->push('Page Not Found');
});

/* START Settings */
// Settings Index
Breadcrumbs::for('user.settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Settings', route('user.settings.index'), ['icon' => 'fa-regular fa-slash-forward', 'color' => 'text-gray-300']);
});

// Settings Account
Breadcrumbs::for('user.settings.account', function (BreadcrumbTrail $trail) {
    $trail->parent('user.settings.index');
    $trail->push('Account Preferences', route('user.settings.account'), ['icon' => 'fa-regular fa-slash-forward', 'color' => 'text-gray-300']);
});

// Settings Password
Breadcrumbs::for('user.settings.password', function (BreadcrumbTrail $trail) {
    $trail->parent('user.settings.index');
    $trail->push('Password', route('user.settings.password'), ['icon' => 'fa-regular fa-slash-forward', 'color' => 'text-gray-300']);
});

// Settings 2FA
Breadcrumbs::for('user.settings.2fa', function (BreadcrumbTrail $trail) {
    $trail->parent('user.settings.index');
    $trail->push('Two Factor Authentication', route('user.settings.2fa'), ['icon' => 'fa-regular fa-slash-forward', 'color' => 'text-gray-300']);
});


/* END Settings */
