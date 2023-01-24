<?php

namespace App\Providers;

use App\Interfaces\ICurrencyInterface;
use App\Services\NbrbBank;
use App\Services\PriorBank;
use Illuminate\Support\ServiceProvider;

class DiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton(ICurrencyInterface::class, function (){
            return PriorBank::class;
        });
    }
}
