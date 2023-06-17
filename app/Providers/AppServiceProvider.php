<?php

namespace App\Providers;

use App\Models\Tag;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerStyles([
                asset('assets/fonts/fa/css/all.min.css'),
            ]);
        });

        view()->composer('*',function($view) {
            $view->with('tags', Tag::orderBy('order', 'asc')->get());
        });
    }
}
