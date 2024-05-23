<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyZahlsOrigin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedOrigin = 'zahls.ch';
        $agent = $request->userAgent();

        if (strpos($agent, $allowedOrigin) !== false) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 403);

    }
}
