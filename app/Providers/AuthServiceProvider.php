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
       // $this->registerPolicies();
        
        $this->registerPolicies();

       $user = \Auth::user();

        
        Gate::define('super_admin', function ($user) {
            return in_array($user->role_id, [0]);
        });
        
        // Auth gates for: User management
        Gate::define('admin', function ($user) {
            return in_array($user->role_id, [1]);
        });
        
        // Gate::define('super_admin_admin', function ($user) {
        //     return in_array($user->role_id, [0,1]);
        // });
            
        //     Gate::define('Transaction_Rights', function ($user) {
        //     return in_array($user->role_id, [2]);
        // });
        
        // Gate::define('Report_Viewer', function ($user) {
        //     return in_array($user->role_id, [3]);
        // });
        
        
        
        

        //
    }
}
