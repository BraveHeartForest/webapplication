@extends('layouts.base')

@section('title','社員情報登録')

@section('header')
    <ul class="list-inline header">
        @if(session('user')==null)
        <li class="itigyou">ようこそXXX＝サン</li>
        @else
        <li class="itigyou">ようこそ{{session('user')}}＝サン</li>
        @endif
        <li class="itigyou"><a href="{{route('logout')}}">ログアウト</a></li>
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
    <form action="/emp" method="POST">
    {{csrf_field()}}
    <table>
        <tr>
            <th>名前</th>
            <td><input type="text" name="emp_name" value="{{old('emp_name')}}"></td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td><input type="password" name="emp_pass"></td>
        </tr>
        <tr>
            <th>パスワード（再確認）</th>
            <td><input type="password" name="emp_pass_confirm"></td>
        </tr>
        <tr>
            <th>性別</th>
            <td><input type="radio" name="gender" value="0" checked>男
            <input type="radio" name="gender" value="1">女</td>
        </tr>
        <tr>
            <th>住所</th>
            <td><input type="text" name="address" value="{{old('address')}}" class="address"></td>
        </tr>
        <tr>
            <th>生年月日</th>
            <td><input type="date" name="birthday" value="{{old('birthday')}}"></td>
        </tr>
        <tr>
            <th>権限</th>
            <td><input type="radio" name="authority" value="0" checked>管理者
            <input type="radio" name="authority" value="1">ゲスト</td>
        </tr>
        <tr>
            <th>部署名</th>
            <td><select name="dept_id">
                @foreach($dept as $key => $value)
                <option value="{{$value->dept_id}}">{{$value->dept_name}}</option>
                @endforeach
            </select></td>
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
    {{--@if(Session::has('form'))
    <div>
        <table>
        @foreach(session('form') as $key => $value)
        <tr>
            <th>{{$key}}</th>
            <td>{{$value}}</td>
        </tr>
        @endforeach
        </table>
        <p>上記の内容を登録しました。</p>
    </div>
    @endif--}}
    <a href="http://127.0.0.1:8000/emp">社員登録画面へ</a><br>
    <a href="http://127.0.0.1:8000/dept">部署登録画面へ</a><br>
    <a href="http://127.0.0.1:8000/list">一覧画面へ</a><br>
    <a href="http://127.0.0.1:8000/login">ログイン画面へ</a>
@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection