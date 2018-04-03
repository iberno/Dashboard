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
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if  (!$request->user()->hasRole($role)) {
            return response()->view('errors.403');
        }
        if ($permission !== null && !$request->user()->can($permission)) {
            return response()->view('errors.403');
        }
        return $next($request); 
    }
}
