<?php

namespace App\Http\Middleware;

use Closure;

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
        // return $next($request);
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }else{
            return redirect('home')->with('suc', 'anda tidak memiliki hak admin');
        }
    }
}
