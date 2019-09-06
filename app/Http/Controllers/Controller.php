<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Crypt;  //暗号化のために追加 2019.8/16
//https://traveler0401.com/laravel-crypt/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    
    /**
     * 以下は暗号化の処理
     * 
     * @param $value 暗号化前の値
     * @return 暗号化後の値
     */
    public function decrypt($value){
        return Crypt::decrypt($value);
    }
    /**
     * 復号化処理
     * 
     * @param $value 復号化前の値
     * @return 復号化後の値
     */
    public function encrypt($value){
        return Crypt::encrypt($value);  
    }
}
