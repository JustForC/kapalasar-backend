<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->roles->name == "Admin" || Auth::user()->roles->name == "Super Admin"){
                return $next($request);
            }

            Auth::logout();
            return redirect('/login');
        }
        
        return redirect('/login');
    }
}
