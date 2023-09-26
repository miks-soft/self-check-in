<?php

namespace App\Providers;

use App\Contracts\BookingRepositoryContract;
use App\Contracts\BookingServiceContract;
use App\Contracts\ExternalBookingClientContract;
use App\Contracts\LocalizationRepositoryContract;
use App\Contracts\LocalizationServiceContract;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Localization\LocalizationRepository;
use App\Repositories\Localization\LocalizationRepositoryCached;
use App\Services\Booking\BookingService;
use App\Services\Booking\Frontdesk\FrontdeskClient;
use App\Services\Localization\LocalizationService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(LocalizationRepositoryContract::class,
            LocalizationRepositoryCached::class);

        $this->app->when(LocalizationRepositoryCached::class)
            ->needs(LocalizationRepositoryContract::class)
            ->give(LocalizationRepository::class);

        $this->app->bind(BookingRepositoryContract::class,
            BookingRepository::class);

        $this->app->bind(LocalizationServiceContract::class,
            LocalizationService::class);

        $this->app->bind(ExternalBookingClientContract::class,
            FrontdeskClient::class);

        $this->app->bind(BookingServiceContract::class,
            BookingService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (App::environment('imedia'))
            Schema::defaultStringLength(191);
    }
}
