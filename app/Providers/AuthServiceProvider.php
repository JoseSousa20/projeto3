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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::degine('atualizar-musico', function($user,$musico){
            return $user->id==$musico->id_user;
        });
        Gate::degine('atualizar-musica', function($user,$musica){
            return $user->id==$musica->id_user;
        });
        Gate::degine('atualizar-album', function($user,$album){
            return $user->id==$album->id_user;
        });
        Gate::degine('atualizar-genero', function($user,$genero){
            return $user->id==$genero->id_user;
        });
    }
}
