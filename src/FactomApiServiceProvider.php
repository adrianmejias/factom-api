<?php

namespace AdrianMejias\FactomApi;

use Illuminate\Support\ServiceProvider;

class FactomApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // merge our configuration
        $this->mergeConfigFrom(__DIR__.'/../config/factom-api.php', 'factom-api');

        // publish our configuration
        $this->publishes([
            __DIR__.'/../config/factom-api.php' => config_path('factom-api.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register our singletons

        // Factom Api
        $this->app->singleton(FactomApi::class, function () {
            $url = config('factom-api.url');
            $ssl = config('factom-api.ssl.enable');
            $certificate = config('factom-api.ssl.certificate');
            $username = config('factom-api.username');
            $password = config('factom-api.password');

            return new FactomApi($url, $ssl, $certificate, $username, $password);
        });

        // Factom Wallet Api
        $this->app->singleton(FactomWalletApi::class, function () {
            $url = config('factom-api.wallet.url');
            $ssl = config('factom-api.wallet.ssl.enable');
            $certificate = config('factom-api.wallet.ssl.certificate');
            $username = config('factom-api.wallet.username');
            $password = config('factom-api.wallet.password');

            return new FactomWalletApi($url, $ssl, $certificate, $username, $password);
        });

        // Factom Debug Api
        $this->app->singleton(FactomDebugApi::class, function () {
            $url = config('factom-api.debug.url');
            $ssl = config('factom-api.debug.ssl.enable');
            $certificate = config('factom-api.debug.ssl.certificate');
            $username = config('factom-api.debug.username');
            $password = config('factom-api.debug.password');

            return new FactomDebugApi($url, $ssl, $certificate, $username, $password);
        });

        // register our alias
        $this->app->alias(FactomApi::class, 'FactomApi');
        $this->app->alias(FactomWalletApi::class, 'FactomWalletApi');
        $this->app->alias(FactomDebugApi::class, 'FactomDebugApi');
    }
}
