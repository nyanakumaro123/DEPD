<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // ✅ Gunakan Facade Auth (AMAN IDE & RUNTIME)
        if (!Auth::check()) {
            abort(403, 'Unauthenticated');
        }

        $user = Auth::user();

        // ✅ Pastikan user tidak null
        if (!$user || $user->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
