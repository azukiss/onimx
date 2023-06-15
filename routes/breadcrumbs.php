<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('page.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('page.home'), ['icon' => 'fa-home']);
});

// Error 404
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->push('Page Not Found');
});

/* START Settings */
// Settings Index
Breadcrumbs::for('user.settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('page.home');
    $trail->push('Settings', route('user.settings.index'));
});

// Settings Account
Breadcrumbs::for('user.settings.account', function (BreadcrumbTrail $trail) {
    $trail->parent('user.settings.index');
    $trail->push('Account Preferences', route('user.settings.account'));
});

// Settings Password
Breadcrumbs::for('user.settings.password', function (BreadcrumbTrail $trail) {
    $trail->parent('user.settings.index');
    $trail->push('Password', route('user.settings.password'));
});

// Settings 2FA
Breadcrumbs::for('user.settings.2fa', function (BreadcrumbTrail $trail) {
    $trail->parent('user.settings.index');
    $trail->push('Two Factor Authentication', route('user.settings.2fa'));
});


/* END Settings */

/* START Cosplay Page */
Breadcrumbs::for('post.cosplay', function (BreadcrumbTrail $trail) {
    $trail->parent('page.home');
    $trail->push('Cosplay', route('post.cosplay'));
});
/* END Cosplay Page */
