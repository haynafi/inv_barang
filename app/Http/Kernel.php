<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Trust proxy headers
        \Illuminate\Http\Middleware\TrustProxies::class,

        // Handle maintenance mode
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Validate POST size
        \Illuminate\Http\Middleware\ValidatePostSize::class,

        // Convert empty strings to null
        \App\Http\Middleware\TrimStrings::class,

        // Normalize slashes in URIs
        \Illuminate\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Encrypt cookies
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,

            // Share errors from the session with the view
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,

            // Verify CSRF token
            \App\Http\Middleware\VerifyCsrfToken::class,

            // Handle route bindings
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            'throttle:api',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Authenticate the user
        'auth' => \App\Http\Middleware\Authenticate::class,

        // Redirect guests
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Authorize actions
        'can' => \Illuminate\Auth\Middleware\Authorize::class,

        // API throttling
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Handle role-based permissions
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,

        // Handle permissions
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
    ];
}
