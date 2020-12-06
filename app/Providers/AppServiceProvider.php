<?php

namespace App\Providers;

use App\Common\Services\SocialGroupService;
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
        $this->app->singleton(SocialGroupService::class, function () {
            return new SocialGroupService(
                new VKApiClient()
            );
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
