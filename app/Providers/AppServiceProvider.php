<?php

namespace App\Providers;

use App\Groups\Contracts\GroupServiceInterface;
use App\Jobs\FetchDataGroupsVk;
use App\Jobs\FetchDataGroupsYoutube;
use App\Models\Groups\Services\GroupVKService;
use App\Models\Groups\Services\GroupYoutubeService;
use Google_Client;
use Illuminate\Support\ServiceProvider;
use VK\Client\VKApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GroupVKService::class, function () {
            return new GroupVKService(
                new VKApiClient(),
                config('services.vk.token')
            );
        });
        $this->app->singleton(GroupYoutubeService::class, function () {
            return new GroupYoutubeService(
                new Google_Client(),
                config('services.youtube.token')
            );
        });
        $this->app->when(FetchDataGroupsVk::class)
            ->needs(GroupServiceInterface::class)
            ->give(function () {
                return app()->get(GroupVKService::class);
            });
        $this->app->when(FetchDataGroupsYoutube::class)
            ->needs(GroupServiceInterface::class)
            ->give(function () {
                return app()->get(GroupYoutubeService::class);
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
