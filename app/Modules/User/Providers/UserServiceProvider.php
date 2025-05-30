<?php

namespace App\Modules\User\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\User\Repositories\UserRepositoryInterface;
use App\Modules\User\Policies\UserCrudPolicy;


class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/UserApi.php');
        Gate::define('index', [UserCrudPolicy::class, 'index']);
        Gate::define('store', [UserCrudPolicy::class, 'store']);
        Gate::define('show', [UserCrudPolicy::class, 'show']);
        Gate::define('update', [UserCrudPolicy::class, 'update']);
        Gate::define('destroy', [UserCrudPolicy::class, 'destroy']);
        Gate::define('search', [UserCrudPolicy::class, 'search']);
    }
}
