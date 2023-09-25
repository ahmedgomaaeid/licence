<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if($request->segment(1) == 'admin'){
                return route('admin.login');
            }elseif($request->segment(1) == 'operation'){
                return route('operation.login');
            }elseif($request->segment(1) == 'security'){
                return route('security.login');
            }else
            {
                return route('login');
            }
        };
    }
}
