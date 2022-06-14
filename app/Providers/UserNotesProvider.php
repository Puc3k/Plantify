<?php

namespace App\Providers;

use App\Repository\UserNotesRepository;
use Illuminate\Support\ServiceProvider;

class UserNotesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserNotesRepository::class, \App\Repository\Eloquent\UserNotesRepository::class
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
