<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/* START Page */
// Home
Breadcrumbs::for('page.home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('page.home'), ['icon' => 'fa-home']);
});

// Upgrade Page
Breadcrumbs::for('page.upgrade.index', function (BreadcrumbTrail $trail) {
    $trail->parent('page.home');
    $trail->push(__('Upgrade'), route('page.upgrade.index'));
});

// Upgrade Payment
Breadcrumbs::for('page.upgrade.payment', function (BreadcrumbTrail $trail, $plan) {
    $trail->parent('page.upgrade.index');
    $trail->push($plan->name);
    $trail->push(__('Order Confirmation'), route('page.upgrade.payment', $plan->code));
});

//Invoices
Breadcrumbs::for('page.invoice', function (BreadcrumbTrail $trail) {
    $trail->parent('page.home');
    $trail->push(__('Invoices'), route('page.invoice.index'));
});

Breadcrumbs::for('page.invoice.upgrade.index', function (BreadcrumbTrail $trail) {
    $trail->parent('page.invoice');
    $trail->push(__('Upgrade Invoices'), route('page.invoice.upgrade.index'));
});

Breadcrumbs::for('page.invoice.upgrade.show', function (BreadcrumbTrail $trail, $invoice) {
    $trail->parent('page.invoice.upgrade.index');
    $trail->push(__('#' . $invoice->code), route('page.invoice.upgrade.show', $invoice->code));
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
