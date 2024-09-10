<?php

use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\ReviewerAuthenticated;
use App\Http\Middleware\SuperAdminAuthenticated;
use App\Http\Middleware\UserAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //declaring all my role middleware
        $middleware->alias([
            'admin' => AdminAuthenticated::class,
            'reviewer' => ReviewerAuthenticated::class,
            'user' => UserAuthenticated::class,
            'super-admin' => SuperAdminAuthenticated::class,
        ])
       
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
