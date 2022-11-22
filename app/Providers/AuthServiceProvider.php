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

        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {

           return $user->role == '0';

        });

        Gate::define('isUser', function($user) {

            return $user->role == '1';

        });

        Gate::define('isEmp', function($user) {

            return $user->role == '2';

        });
        Gate::define('isHR', function($user) {

            return $user->role == '4';

        });
        Gate::define('isHead', function($user) {

            return $user->role == '3';

        });
        Gate::define('isMayor', function($user) {

            return $user->role == '5';

        });
        Gate::define('isSuperAdmin', function($user) {

            return $user->id == '1';

        });
    }
}
