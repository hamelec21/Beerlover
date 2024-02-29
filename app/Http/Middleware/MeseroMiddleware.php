<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeseroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle($request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->HasRole('MESERO')) {
            abort(403, 'No tienes permisos para acceder a esta página mesero.');
        }
        return $next($request);
    }



}
