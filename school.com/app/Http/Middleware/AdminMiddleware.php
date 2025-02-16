<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            if(Auth::user()-> user_type == 1){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect('/');
            }
        }
        else{
            Auth::logout();
            return redirect('/');
        }

    }
}
