<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard=null)
    {
        if(Auth::guard($guard)->check()){
            $type = Auth::user()->type;
            switch($type){
                case 'admin':
                    return redirect('/admin');
                    break;
                case 'candidate':
                    return redirect('/candidate');
                    break;
                case 'citizen':
                    return redirect('/citizen');
                    break;
                default:
                    return redirect('/home');
                    break;
            }
        }

        return $next($request);
    }
}
