<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(auth()->check()){
            if($role == 'admin&operator'){
                if(auth()->user()->role == 'admin' && auth()->user()->role == 'operator'){
                    return $next($request);
                }
            }elseif($role == 'admin' && auth()->user()->role == 'admin'){
                return $next($request);
            }elseif($role == 'operator' && auth()->user()->role == 'operator'){
                return $next($request);
            }

            return redirect()->back();
        }

        return redirect()->route('login');
    }
}
