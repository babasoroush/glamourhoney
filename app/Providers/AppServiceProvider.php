<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            if (str_starts_with($modelName, 'App\\Modules\\')) {
                $parts = explode('\\Models\\', $modelName);

                if (count($parts) === 2) {
                    $moduleBasePath = $parts[0];
                    $modelBasename = class_basename($modelName);
                    return $moduleBasePath . '\\Database\\Factories\\' . $modelBasename . 'Factory';
                }
            }
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
    }
}
