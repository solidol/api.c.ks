<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Hashing\BcryptHasher;

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
        app('hash')->extend('legacy-bcrypt', function () {
            return new BcryptHasher($this->app['config']['hashing.bcrypt'] ?? []);
        });
    }
}
