<?php

namespace App\Modules\Media\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Media\Repositories\ImageRepository;
use App\Modules\Media\Repositories\ImageRepositoryInterface;


class MediaServiceProvider extends ServiceProvider
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
