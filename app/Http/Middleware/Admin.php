<?php
namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Closure;


class Admin
{   

    protected $auth;

    public function __contruct(Guard $auth){
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {   
        if(Auth::User()->type > 3){
            Auth::logout();
            return redirect('/');
        }else
        return $next($request);
    }
}
