<?php

namespace Topdigital\Auth;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../database/factories');
    }
}
