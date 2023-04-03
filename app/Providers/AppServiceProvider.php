<?php

namespace App\Providers;
use App\Models\Sauce;
use App\Observers\SauceObserver;

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

    
    public function boot()
    {
        Sauce::observe(SauceObserver::class);
    }

}
