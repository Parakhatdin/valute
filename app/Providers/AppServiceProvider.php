<?php

namespace App\Providers;

use App\Repositories\CurrencyRepository;
use App\Repositories\RateRepository;
use App\Services\Contracts\CurrencyService as CurrencyServiceInterface;
use App\Services\Contracts\RateService as RateServiceInterface;
use App\Repositories\Contracts\CurrencyRepository as CurrencyRepositoryInterface;
use App\Repositories\Contracts\RateRepository as RateRepositoryInterface;
use App\Services\CurrencyService;
use App\Services\RateService;
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
        $this->app->bind(CurrencyServiceInterface::class, CurrencyService::class);
        $this->app->bind(RateServiceInterface::class, RateService::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(RateRepositoryInterface::class, RateRepository::class);
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
