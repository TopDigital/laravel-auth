<?php

namespace TopDigital\Auth;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use TopDigital\Auth\Console\InitPermissionsCommand;
use TopDigital\Auth\Console\SecretCommand;
use TopDigital\Auth\Models\User;
use TopDigital\Auth\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadFactoriesFrom(__DIR__.'/../database/factories');

        \Gate::policy(User::class, UserPolicy::class);

        Passport::routes();

        if ($this->app->runningInConsole()) {

            $this->commands([
                SecretCommand::class,
            ]);
        }
    }
}
