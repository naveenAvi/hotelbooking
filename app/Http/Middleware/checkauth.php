<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->cookie('email');
        $password = $request->cookie('password');
        if(($email == '')|| ($password == '')){
            return redirect('login');
            
        }
        return $next($request);
    }
}
