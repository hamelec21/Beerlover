<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            $user = Auth::guard($guard)->user();

            // Verificar si el usuario está autenticado
            if ($user && $user->estado !== 'activo') {
                // Cerrar la sesión del usuario
                Auth::guard($guard)->logout();
                // Devolver mensaje de estado en revisión y redirigir a la página de inicio de sesión
                return redirect()->route('login')->with('status', 'Su estado está siendo revisado. Por favor, vuelva a iniciar sesión.');
               // return view('auth.login')->with('status', 'Su estado está siendo revisado. Por favor, vuelva a iniciar sesión.');
            }

            // Verificar si el usuario está autenticado y luego redirigir si es necesario
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }




}
