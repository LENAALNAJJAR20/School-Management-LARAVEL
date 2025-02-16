<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ParentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check())){
            if(Auth::user()-> user_type == 4){
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
