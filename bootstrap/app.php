<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, $request) {
            $code = $e instanceof HttpException ? $e->getStatusCode() : 500;
            $message = $e->getMessage() ?: 'An unexpected error occurred';

            return response()->json([
                'status' => 'error',
                'message' => $message,
            ], $code);
        });
    })->create();

// ----------------------------------------------------

return $app;
