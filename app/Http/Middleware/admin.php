<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->level == 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
