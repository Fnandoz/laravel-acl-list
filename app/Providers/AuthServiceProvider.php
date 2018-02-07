<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerListaPolicies();
        //
    }

    public function registerListaPolicies()
    {
      Gate::define('create-list', function ($user) {
        return $user->possuiAcesso(['master', 'create']);
      });

      Gate::define('read-list', function ($user) {
        return $user->possuiAcesso(['master', 'read']);
      });

      Gate::define('update-list', function ($user) {
        return $user->possuiAcesso(['master', 'update']);
      });

      Gate::define('delete-list', function ($user) {
        return $user->possuiAcesso(['master', 'delete']);
      });

      Gate::define('lista', function ($user) {
        return $user->possuiAcesso(['master', 'create', 'read', 'update', 'delete']);
      });
    }
}
