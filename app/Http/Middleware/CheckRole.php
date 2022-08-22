<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'admin-master' && auth()->user()->category != 'admin master') {
            abort(403);
        }

        if ($role == 'admin-user' && auth()->user()->category != 'admin user') {
            abort(403);
        }

        if ($role == 'user' && auth()->user()->category != 'user') {
            abort(403);
        }

        return $next($request);
    }
}
