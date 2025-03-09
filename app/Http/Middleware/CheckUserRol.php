<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$rolesPermitidos): Response
    {
        $rol = Auth::user()->rol;

        if (!in_array($rol, $rolesPermitidos)) {
            Log::error('CheckUserRol.handle Usuario no dispone de rol necesario para la acción', [
                'rol_usuario' => $rol,
                'roles_necesarios' => $rolesPermitidos
            ]);
     
            return response()->json([
                'message' => 'Unauthorized. Rol: ' . $rol . ' no está entre los permitidos: ' . implode(', ', $rolesPermitidos)
            ], 403);
        }

        return $next($request);
    }
}
