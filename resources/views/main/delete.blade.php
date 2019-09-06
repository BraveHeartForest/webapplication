@extends('layouts.base')

@section('title','Add')

@section('header')
    <ul class="list-inline header">
        <li class="itigyou">ようこそXXX＝サン</li>
        <li class="itigyou">ログアウト</li>
    </ul>
@endsection


@section('content')
    @if(count($errors)>0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/update" method="POST">
    {{csrf_field()}}
    <table>
        <tr>
            <th>旧パスワード(入力必須)</th>
            <td><input type="text" name="old_pass" value=""></td>
        </tr>
        <tr>
            <th>新パスワード(変更しない場合は入力不要)</th>
            <td><input type="password" name="new_pass" value=""></td>
        </tr>
        <tr>
            <th>名前</th>
            <td><input type="text" name="emp_name" value="{{$data->emp_name}}"></td>
        </tr>
        <tr>
            <th>性別</th>
            <td><input type="radio" name="gender" value="0" checked>男
            <input type="radio" name="gender" value="1">女</td></td>
        </tr>
        <tr>
            <th>住所</th>
            <td><input type="text" name="address" value="{{$data->address}}" class="address"></td>
        </tr>
        <tr>
            <th>生年月日</th>
            <td><input type="date" name="birthday" value="{{$data->birthday}}"></td>
        </tr>
        <tr>
            <th>部署ID</th>
            <td><input type="number" name="dept_id" value="{{$data->dept_id}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="送信"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="reset" value="リセット"></td>
        </tr>
    </table>
    </form>
    @if(session('auth')===0)
    <a href="http://127.0.0.1:8000/emp">社員登録画面へ</a><br>
    <a href="http://127.0.0.1:8000/dept">部署登録画面へ</a><br>
    @endif
    <a href="http://127.0.0.1:8000/list">一覧画面へ</a><br>
    <a href="http://127.0.0.1:8000/login">ログイン画面へ</a>

@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection