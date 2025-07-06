<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     */

    protected $middleware = [
        // other middleware...
        \Illuminate\Http\Middleware\HandleCors::class,
    ];

}
