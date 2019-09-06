<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class SessionCheck
{
    /**
     * SESSIONにuserが登録されていなければログイン画面へ戻したい。
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $bool=Session::has('user');
        if($bool==false){
            return redirect('/login');
        }
        return $next($request);
    }
}
