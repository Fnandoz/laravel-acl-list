<?php

namespace App\Providers;

use App\Policies\ListaPolicy;
use App\Lista;
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
        Lista::class => ListaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerListaPolicies();
        //
    }

    public function registerListaPolicies()
    {
      //Gate::define('cria-lista', 'ListaPolicy@create');
      //Gate::define('le-lista', 'ListaPolicy@view');
      //Gate::define('atualiza-lista', 'ListaPolicy@update');
      //Gate::define('apaga-lista', 'ListaPolicy@delete');
      //Gate::define('all.lista', 'ListaPolicy@all');


      Gate::define('cria-lista', function ($user) {
        return $user->possuiAcesso(['master', 'create']);
      });

      Gate::define('le-lista', function ($user) {
        return $user->possuiAcesso(['master', 'read']);
      });

      Gate::define('atualiza-lista', function ($user) {
        return $user->possuiAcesso(['master', 'update']);
      });

      Gate::define('apaga-lista', function ($user) {
        return $user->possuiAcesso(['master', 'delete']);
      });

      Gate::define('all-lista', function ($user) {
        return $user->possuiAcesso(['master', 'create', 'read', 'update', 'delete']);
      });
      
    }


}
