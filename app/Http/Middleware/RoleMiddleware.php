<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($role === 'admin' && !$user->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        if ($role === 'vendor' && !$user->isVendor() && !$user->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        if ($role === 'customer' && !$user->isCustomer()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}