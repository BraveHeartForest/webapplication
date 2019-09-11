@extends('layouts.base')

@section('title','編集')

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
    <form action="/update" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="emp_id" value="{{$id}}">
    <table>
        <tr>
            <th>旧パスワード(入力必須)</th>
            <td><input type="text" name="old_pass" value="" onInput="checkForm(this)">
                {{--<input type="hidden" name="old_pass_confirmation" value="{{$data->emp_pass}}"> ソースコードで簡単に見えるので不適切。--}}
                試験的に作成しているだけなのでpasswordが見えるようにtype="text"としている。
        </td>
        </tr>
        <tr>
            <th>新パスワード(変更しない場合は入力不要)</th>
            <td><input type="password" name="new_pass" value="" onInput="checkForm(this)"></td>
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