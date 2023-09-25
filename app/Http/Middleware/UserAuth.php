<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->guard('web')->check())
        {
            if (auth()->guard('web')->user()->operation_approve == 0) {
                auth()->guard('web')->logout();
                return redirect()->route('login')->with('err', 'يرجى الانتظار حتى يتم الموافقة على طلبك');
            }
            if (auth()->guard('web')->user()->admin_approve == 0) {
                auth()->guard('web')->logout();
                return redirect()->route('login')->with('err', 'يرجى الانتظار حتى يتم الموافقة على طلبك');
            }elseif (auth()->guard('web')->user()->admin_approve == 2) {
                auth()->guard('web')->logout();
                return redirect()->route('login')->with('err', 'تم رفض طلبك');
            }
        }
        return $next($request);
    }
}
