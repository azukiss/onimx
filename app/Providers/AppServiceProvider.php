<?php

namespace App\Providers;

use App\Models\Category;
use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
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
            // Filament::registerViteTheme('resources/css/filament/custom.css');
            Filament::registerRenderHook(
                'head.end',
                  static fn()=>(new Vite)(['resources/css/fa.css'])
              );
            Filament::registerStyles([
                // asset('assets/fonts/fa/css/all.min.css'),
            ]);
        });

        view()->composer('templates.global.sidebar',function($view) {
            $view->with('categories', Category::with('tags')->orderBy('order', 'asc')->get());
        });
    }
}
