<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        

        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('isPetugas', function($user) {
            return $user->role == 'petugas';
        });
        Gate::define('isTu', function($user) {
            return $user->role == 'tu';
        });
        Gate::define('isKepsek', function($user) {
            return $user->role == 'kepsek';
        });


        //
    }

}
