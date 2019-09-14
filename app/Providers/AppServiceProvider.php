<?php

namespace App\Providers;

use Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $baseUrl = env('kNAWAT_BASE_URL');

        $this->app->singleton('GuzzleHttp\Client', function($api) use ($baseUrl) {
            return new Client([
                'base_uri' => $baseUrl,
            ]);
        });

        //set the session
        Session::put('lang','En');
        Schema::defaultStringLength(191);

        // the session is arabic directive
        Blade::if('sar', function () {
            if(Session::get('lang') == 'Ar'){
                return true;
            }
            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
