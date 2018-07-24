<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roleName = array_except(func_get_args(), [0,1]);
        if(! $request->user()->authorizeRoles($roleName))
        {
            return redirect('login');
        }
        return $next($request);
    }
}
