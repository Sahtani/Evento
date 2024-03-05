<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;
            if ($role === 'admin') {
                return $next($request);
            }elseif($role === 'organizator'){
                return redirect()->route('organizator.userdash');
            }else{      
                return redirect()->route('user.userdash');
            }
        }   return redirect('/login');  
    }
}
