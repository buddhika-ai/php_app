<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles  // Allows passing multiple roles, e.g., checkrole:dean,manager
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if (!$user->hasRole(...$roles)) { // Assumes hasRole can check against multiple roles if needed
            // Or redirect to a different page with an error message
            return abort(403, 'Forbidden. You do not have the required role.');
        }

        return $next($request);
    }
}
