@extends('layouts.base')

@section('title','部署情報登録')

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
    <form action="/dept" method="POST">
    {{csrf_field()}}
    <table>
        <tr>
            <th>部署ID</th>
            <td><input type="number" name="dept_id"></td>
        </tr>
        <tr>
            <th>部署名</th>
            <td><input type="text" name="dept_name"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="送信"></td>
        </tr>
    </table>
    <h2>現在の登録されている部署一覧</h2>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>部署名</th>
            </tr>
            @foreach($dept_data as $dept)
            <tr>
                <td>{{$dept->dept_id}}</td>
                <td>{{$dept->dept_name}}</td>
            </tr>
            @endforeach
        </table>
        <div class="itigyou">
        {{$dept_data->render()}}
        </div>
    </div>
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