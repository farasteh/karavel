<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->blocked_until && !now()->lessThan(auth()->user()->blocked_until)) {
            return response()->json(['data' => ['massage' => __('auth.user.blocked.massage')]], 403);
        }
        return $next($request);
    }
}
