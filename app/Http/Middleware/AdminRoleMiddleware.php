<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('admin_role') !== 'admin') {
            abort(403, 'Access denied.');
        }
        return $next($request);
    }
}
