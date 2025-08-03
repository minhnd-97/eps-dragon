<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $roles
     * @return Response
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $rolesArray = explode(',', $roles);

        if (!auth()->check() || !auth()->user()->hasAnyRole($rolesArray)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
