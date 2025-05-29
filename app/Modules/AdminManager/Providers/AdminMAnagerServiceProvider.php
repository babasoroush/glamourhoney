<?php

namespace App\Modules\AdminManager\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Modules\AdminManager\Repositories\roleRepository;
use App\Modules\AdminManager\Repositories\roleRepositoryInterface;
use App\Modules\AdminManager\Policies\AdminManagerPolicy;

class AdminManagerServiceProvider extends ServiceProvider
{
    public function register (): void
    {
        $this->app->bind(roleRepositoryInterface::class, roleRepository::class);
    }

    public function boot (): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/AdminManagerApi.php');
        Gate::define('assignRole', [AdminManagerPolicy::class, 'assignRole']);
        Gate::define('revokeRole', [AdminManagerPolicy::class, 'revokeRole']);
        Gate::define('viewAllAdmins', [AdminManagerPolicy::class, 'viewAllAdmins']);
    }
}
