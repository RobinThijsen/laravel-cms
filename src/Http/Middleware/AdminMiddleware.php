<?php

namespace LaravelCMS\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use LaravelCMS\Facades\UserConnected;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userConnected = UserConnected::user();

        if (empty($userConnected)) {
            return redirect(route('cms.login'));
        }

        return $next($request);
    }
}
