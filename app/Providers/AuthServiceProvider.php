<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define("Admin", function(User $user){
            return $user->hasRole("Admin");
        });

        Gate::define("Secretaire", function(User $user){
            return $user->hasRole("Secretaire");
        });

        Gate::define("Medecin", function(User $user){
            return $user->hasRole("Medecin");
        });

        Gate::define("Patient", function(User $user){
            return $user->hasRole("Patient");
        });

        Gate::before(function (User $user){
            return $user->hasRole("Medecin_Coordinateur");
        });
        
    }
}
