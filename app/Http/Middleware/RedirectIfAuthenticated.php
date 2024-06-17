<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


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

        // Log::info('RedirectIfAuthenticated middleware triggered.');

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // Check if the user is authenticated
                if ($user) {
                    // Determine the redirect path based on user type
                    $redirectPath = ($user->user_type == '1') ? 'admin/user' : '/';

                    // Avoid redirecting if the current path matches the target path
                    if ($request->path() !== trim($redirectPath, '/')) {
                        return redirect($redirectPath);
                    }
                }
            }
        }

        return $next($request);
    }
}
