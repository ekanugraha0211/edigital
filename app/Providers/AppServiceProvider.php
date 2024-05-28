<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SektorUsaha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $SektorUsaha = SektorUsaha::all(); // Atau logika lain untuk mendapatkan model yang diinginkan
            $view->with('SektorUsaha', $SektorUsaha);
        });
    }
    
}
