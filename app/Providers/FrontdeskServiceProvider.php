<?php

namespace App\Providers;

use GettSleep\Frontdesk\Client;
use GettSleep\Frontdesk\EnvOptionsProvider;
use GettSleep\Frontdesk\GuzzleRequestConverter;
use GettSleep\Frontdesk\OptionsProvider;
use GettSleep\Frontdesk\RequestConverter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

class FrontdeskServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(Client::class)
            ->needs(ClientInterface::class)
            ->give(\GuzzleHttp\Client::class);

        $this->app->when(Client::class)
            ->needs(OptionsProvider::class)
            ->give(EnvOptionsProvider::class);

        $this->app->when(Client::class)
            ->needs(RequestConverter::class)
            ->give(GuzzleRequestConverter::class);

        $this->app->when(Client::class)
            ->needs(LoggerInterface::class)
            ->give(fn() => Log::channel('frontdesk'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
