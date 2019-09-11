@extends('layouts.base')

@section('title','確認画面')

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
    <h3>以下の内容で登録しても宜しいでしょうか。</h3>
    <form action="/emp" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}
    <table>
        </tr>
        <tr>
            <th>パスワード</th>
            <td><input type="hidden" name="emp_pass" value="{{$data['emp_pass']}}">{{$data['emp_pass']}}</td>
        </tr>
        <tr>
            <th>名前</th>
            <td><input type="hidden" name="emp_name" value="{{$data['emp_name']}}">{{$data['emp_name']}}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td><input type="hidden" name="gender" value="{{$data['gender']}}">{{$data['gender']==0 ? "男":"女"}}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td><input type="hidden" name="address" value="{{$data['address']}}" class="address">{{$data['address']}}</td>
        </tr>
        <tr>
            <th>生年月日</th>
            <td><input type="hidden" name="birthday" value="{{$data['birthday']}}">{{$data['birthday']}}</td>
        </tr>
        <tr>
            <th>権限</th>
            <td><input type="hidden" name="authority" value="{{$data['authority']}}">{{$data['authority']==0 ? "管理者":"ゲスト"}}</td>
        </tr>
        <tr>
            <th>部署名</th>
            @foreach($dept as $dept_data)
            <td><input type="hidden" name="dept_id" value="{{$data['dept_id']}}">{{$dept_data->dept_name}}</td>
            @endforeach
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="送信"></td>
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