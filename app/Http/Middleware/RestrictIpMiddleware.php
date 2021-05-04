<?php

namespace App\Http\Middleware;

use Closure;

class RestrictIpMiddleware
{
    // set IP addresses
    public $restrictIps = ['ip-addr-1', 'ip-addr-2', '127.0.0.1'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array($request->ip(), $this->restrictIps)) {
            return response()->json(['message' => "You don't have permission to access this website."]);
        }

        return $next($request);
    }
}