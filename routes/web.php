<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EmpTableController;
use App\Http\Middleware\GuardQueryChange;
use App\Http\Middleware\SessionCheck;
use App\Http\Requests\UploaderRequest;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/emp','EmpTableController@create')->middleware(SessionCheck::class);
Route::post('/emp','EmpTableController@empConfirm')->middleware(SessionCheck::class);
Route::put('/emp','EmpTableController@store')->middleware(SessionCheck::class);

Route::get('/dept','DeptTableController@add')->middleware(SessionCheck::class);
Route::post('/dept','DeptTableController@create');

Route::get('/login','EmpTableController@getLogin');
Route::post('/login','EmpTableController@postLogin');

Route::get('/list','EmpTableController@listing')->middleware(SessionCheck::class);


//Route::でデータの入力などを行ったあとはRoute::getに従って表示される。このとき、getを定義していないとエラーが発生。
//getにしているとクエリ値を書き換えると別の個人情報にアクセスできるのでputで基本画面へ送るようにしていた。
Route::delete('/update','EmpTableController@edit')->middleware(SessionCheck::class)->name('update');   //deleteとあるが、実際はURLクエリ対策でgetはリダイレクトされるようにしてあるだけ。他の方法があれば良いのだが……
Route::post('/update','EmpTableController@postUpdate')->middleware(SessionCheck::class);
Route::put('/update','EmpTableController@putUpdate')->middleware(SessionCheck::class);
Route::get('/update','EmpTableController@queryguard')->middleware(SessionCheck::class)->middleware(GuardQueryChange::class);


Route::delete('/delete','EmpTableController@destroy')->middleware(SessionCheck::class);

Route::get('/logout','EmpTableController@logout')->middleware(SessionCheck::class)->name('logout');
//これによって<a href="{{route('logout')}}>という形式で利用できる。

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::get('/upload','UploaderController@getIndex');
Route::post('/upload','UploaderController@confirm');
/*Route::post('/upload',function(UploaderRequest $req){
    return dd($req);
});*/
Route::put('/upload','UploaderController@finish');
Route::delete('/upload','UploaderController@remove');

Route::get('/test',function(){
    return $_FILES;
});


Route::get('/contacts','ContactController@index');
Route::post('/contacts','Ajax\ContactController@store');    //↓のものと内容的には同じ。
/*
Route::group(['prefix'=>'ajax'],function(){
    Route::resource('contacts','Ajax\ContactController',[
        'only'=>['store'],
    ]);
});
*/