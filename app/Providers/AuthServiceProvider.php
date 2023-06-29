<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\CommentPolicy;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PostPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */

    protected $policies = [
        Post::class => PostPolicy::class,       //entre PostPolicy et home.blade
        Comment::class => CommentPolicy::class,       //entre PostPolicy et home.blade
    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
