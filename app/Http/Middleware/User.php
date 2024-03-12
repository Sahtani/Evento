<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role === 'user') {
            return $next($request);
        }elseif($request->user()->role === 'organizator'){
            return redirect()->route('organizator.organdashboard');
        }else{
            return redirect()->route('admin.stats');
        }

    }
}
