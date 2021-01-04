<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\UserTypeRedirect as Middleware;
use Illuminate\Support\Facades\Auth;

class UserTypeRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,String $type)
    {
        if(!Auth::check())
            return redirect('/home');
        $user = Auth::user();
        if($user->type == $type)
            return $next($request);
        
        return redirect('/home');
    }
}
