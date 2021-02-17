<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('eAdmin', function ($user) {
            return $user->tipo == "admin";
        });

        Gate::define('est', function ($user) {
            return $user->tipo == "aluno";
        });

        Gate::define('form', function ($user) {
            return $user->tipo == "formador";
        });

        Gate::define('acad', function ($user) {
            return $user->tipo == "academia";
        });

    }
}
