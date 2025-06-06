<?php

namespace App\Modules\Common\Providers;

use Illuminate\Support\ServiceProvider;



class CommonServiceProvider extends ServiceProvider
{
    public function register (): void
    {
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
    }

    public function boot (): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
