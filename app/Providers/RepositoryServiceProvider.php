<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\AlunoRepository::class, \App\Repositories\AlunoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PersonalRepository::class, \App\Repositories\PersonalRepositoryEloquent::class);
        //:end-bindings:
    }
}
