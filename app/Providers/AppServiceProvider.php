<?php

namespace App\Providers;

use App\Models\ChatRoom;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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

        View::composer('layouts.admin', function ($view) {
            $pendingChatCount = ChatRoom::where('status', 'open')
                ->where(function ($query) {
                    $query->whereHas('lastMessage', fn ($q) => $q->where('is_admin', false))
                          ->orWhereDoesntHave('lastMessage');
                })
                ->count();

            $view->with('pendingChatCount', $pendingChatCount);
        });
    }
}
