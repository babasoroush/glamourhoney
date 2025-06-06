<?php

namespace App\Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;



class BlogServiceProvider extends ServiceProvider
{
    public function register (): void
    {
        // $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    public function boot (): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
