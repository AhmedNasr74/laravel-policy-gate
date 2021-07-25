<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        '\App\Models\Post' => '\App\Policies\PostPolicy',
//        '\App\Models\User' => '\App\Policies\UserPolicy',
//        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('posts', PostPolicy::class);
//        Gate::define('posts.create' , 'App\Policies\PostPolicy@create');
    }
}
