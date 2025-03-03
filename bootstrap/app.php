<?php

// use Illuminate\Foundation\Application;
// use Illuminate\Foundation\Configuration\Exceptions;
// use Illuminate\Foundation\Configuration\Middleware;

// return Application::configure(basePath: dirname(__DIR__))
//     ->withRouting(
//         web: __DIR__.'/../routes/web.php',
//         commands: __DIR__.'/../routes/console.php',
//         health: '/up',
//         api: __DIR__.'/../routes/api.php',
//         apiPrefix: 'api',
//     )
//     ->withMiddleware(function (Middleware $middleware) {
//         // $middleware->statefulApi();
//         $middleware->validateCsrfTokens(except: [
//             'http://pzi.test/*',
//         ]);
//         })
//     ->withExceptions(function (Exceptions $exceptions) {
//         //
//     })->create();
    

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
    
    return Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__.'/../routes/web.php',
            commands: __DIR__.'/../routes/console.php',
            health: '/up',
            api: __DIR__.'/../routes/api.php',
            apiPrefix: 'api',
        )
        ->withMiddleware(function (Middleware $middleware) {
            // Dodajemo Sanctum middleware kako bi API podržavao session autentifikaciju
            $middleware->statefulApi();

            $middleware->validateCsrfTokens(except: [
                'http://pzi.test/*',
                'http://pzi012025.studenti.sumit.ba/*',
                'http://pzi012025.studenti.sumit.ba/backend/*'
            ]);
        })
        ->withExceptions(function (Exceptions $exceptions) {
            //
        })->create();
