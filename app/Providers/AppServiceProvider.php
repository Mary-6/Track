<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        $rootUrl = config('app.url');
        $isLocalDefault = in_array($rootUrl, ['http://localhost', 'http://127.0.0.1'], true);
        if ($rootUrl && parse_url($rootUrl, PHP_URL_HOST) && ! $isLocalDefault) {
            URL::forceRootUrl($rootUrl);
        }
    }
}
