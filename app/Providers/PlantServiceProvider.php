<?php

namespace App\Providers;

use App\Repository\Eloquent\UserRepository;
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
            UserRepository::class, \App\Repository\Eloquent\GameRepository::class
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
