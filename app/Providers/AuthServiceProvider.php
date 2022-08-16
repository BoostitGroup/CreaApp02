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

        Gate::define('desactivateCompe', function ($user) { return !($user->role==8); });
        Gate::define('isNotAdherent', function ($user) { return ($user->role<>1);});
        Gate::define('isAdherent', function ($user) { return ($user->role==1); });
        Gate::define('isGestEvent', function ($user) { return ($user->role==5)||($user->role==4)||($user->role==2)||($user->role==3); });
        Gate::define('isGestAdherent', function ($user) { return ($user->role==4)||($user->role==2)||($user->role==3); });
        Gate::define('isAdminSup', function ($user) { return ($user->role==2)||($user->role==3); });
    }
}
