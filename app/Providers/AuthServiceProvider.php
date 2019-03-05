<?php

namespace App\Providers;

// namespace App\Gate;

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
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->id == 1) return true;
        });

        // $gate->before(function ($user) { // before any logic in ProjectPolicy is triggered. aka logiic and permissions that supercede everything else, ie. admin
        //     // return $user->isAdmin(); // need to make isAdmin(), could also be role or column
        //     return $user->id == 1; // William
        // });
    }
}
