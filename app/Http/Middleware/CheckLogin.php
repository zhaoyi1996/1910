<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $Session=session('userInfo');
        // dd($Session);
        if(empty($Session)){
            return redirect('/login');
        }
        return $next($request);
    }
}
