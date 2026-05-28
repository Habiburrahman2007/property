<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // AC-9.2: Force HTTPS in production (prepended so it runs first)
        $middleware->prependToGroup('web', \App\Http\Middleware\ForceHttpsInProduction::class);

        // AC-9.2: Sanitize all string inputs globally to prevent XSS
        $middleware->appendToGroup('web', \App\Http\Middleware\SanitizeStringInputs::class);

        $middleware->alias([
            'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
