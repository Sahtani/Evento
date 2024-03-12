<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Organizator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role === 'organizator') {
            return $next($request);
        }elseif($request->user()->role === 'admin'){
            return redirect()->route('admin.stats');
        }else{
            return redirect()->route('user.userdash');
        }

    }
}
