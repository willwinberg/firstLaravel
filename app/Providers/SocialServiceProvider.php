<?php

namespace App\Providers;

use App\Services\Twitter;
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function register()
    {
        // dd('yoyo');
        $this->app->singleton(Twitter::class, function () {
            return new Twitter(config('services.twitter.key'));
        });
    }
}
