<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class GuardQueryChange
{
    /**
     * SESSIONに登録された権限が1（ゲスト用）ならばゲスト以外のページへのアクセスを制限したい。
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('authority')){  //Sessionが権限情報を保持しているならば
            $authority = Session::get('authority'); //権限情報を代入
            if($authority==1){  //権限がゲストならば
                return redirect('/list');   //リスト画面に戻る
            }
            return $next($request); //ゲストでない⇔管理者である。ならば次の画面に進める。
        }else{  //権限情報を保持していないならば
            return redirect('/login');  //ログイン画面へ戻る。
        }
    }
}
