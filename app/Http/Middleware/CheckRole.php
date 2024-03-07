<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            if ($request->user()->access !== 0) {
                if ($request->user()->role === "admin") {
                    return redirect()->route('admin.admindashboard');
                }else if ($request->user()->role === "user") {
                    return redirect()->route('user.userdash');
                }else if ($request->user()->role === "organizator") {
                    return redirect()->route('organizator.organdashboard');
                }
            }else {
                Auth::logout();
                return redirect()->intended(RouteServiceProvider::HOME)->with("error", "Your account has been banned.");
            }
        }

        return $next($request);
    }
}
