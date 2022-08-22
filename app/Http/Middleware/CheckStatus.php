<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $status)
    {
        if ($status == 'aktif' && auth()->user()->status != 'aktif') {
            abort(403);
        }

        if ($status == 'tidak aktif' && auth()->user()->status != 'tidak aktif') {
            abort(403);
        }
        return $next($request);
    }
}
