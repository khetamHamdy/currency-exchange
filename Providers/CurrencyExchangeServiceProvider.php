<?php

namespace KhetamHamdy\CurrencyExchange\Providers;

use Illuminate\Support\ServiceProvider;
use KhetamHamdy\CurrencyExchange\Services\CurrencyService;
use KhetamHamdy\CurrencyExchange\Services\ExchangeTransactionService;

class CurrencyExchangeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind('currency.service', function () {
            return new CurrencyService();
        });

        $this->app->bind('exchange.service', function () {
            return new ExchangeTransactionService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
