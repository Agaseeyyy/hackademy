<?php

namespace App\Http;

use App\Http\Middleware\AdminMiddleware; 
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'admin' => AdminMiddleware::class, // Add this line
    ];
}