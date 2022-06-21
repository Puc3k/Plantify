<?php

namespace App\Providers;

use App\Repository\PlantRepository;
use Illuminate\Support\ServiceProvider;

class PlantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PlantRepository::class, \App\Repository\Eloquent\PlantRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
