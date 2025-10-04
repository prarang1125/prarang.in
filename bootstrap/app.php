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
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'admin.guest' => \App\Http\Middleware\AdminRedirect::class,
            'admin.auth'  => \App\Http\Middleware\AdminAuthenticate::class,
            'auth.custom' => \App\Http\Middleware\Authenticate::class,
            'language' => \App\Http\Middleware\SetLocale::class, 
            'check.subscription' => \App\Http\Middleware\CheckSubscriptionLimits::class,
            'check.vcard.business' => \App\Http\Middleware\CheckUserVCardAndBusiness::class,
        ]);
        
        $middleware->redirectTo(
            guests: 'yellow-pages/login',
            users: 'yellow-pages/dashboard'
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {        
    })->create();

