<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/* START Page */
// Home
Breadcrumbs::for('page.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('page.home'), ['icon' => 'fa-home']);
});

// Upgrade
Breadcrumbs::for('page.upgrade', function (BreadcrumbTrail $trail) {
    $trail->parent('page.home');
    $trail->push('Upgrade', route('page.upgrade'));
});
/* END Page */

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


/* START Post Page */
Breadcrumbs::for('post.page', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('page.home');
    $trail->push($post->tags->pluck('name')->first(), route('tag.show', $post->tags->pluck('slug')->first()));
    $trail->push($post->title, route('post.page', [$post->id, $post->slug]));
});
/* END Post Page */


/* START Post List by Tag */
Breadcrumbs::for('tag.index', function (BreadcrumbTrail $trail) {
    $trail->parent('page.home');
    $trail->push(__('Tags'), route('tag.index'));
});

Breadcrumbs::for('tag.show', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tag.index');
    $trail->push($tag->name, route('tag.show', $tag->slug));
});
/* END Post List by Tag */
