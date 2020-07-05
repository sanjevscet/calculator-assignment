<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\StoreService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StoreService::class, function() {
            return new StoreService;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
