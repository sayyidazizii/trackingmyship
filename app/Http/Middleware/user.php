<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class user
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->level == 'user') {
            return $next($request);
        }

        return redirect('/');
    }
}
