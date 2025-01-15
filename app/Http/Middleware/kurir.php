<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class kurir
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->level == 'kurir') {
            return $next($request);
        }

        return redirect('/');
    }
}
