<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekTypeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if ($request->user()->id_level) {
            if (in_array($request->user()->id_level, $levels)) {
                return $next($request);
            } else {
                return redirect('/dashboard');
            }
        } else {
            return redirect('/dashboard');
        }
    }
}
