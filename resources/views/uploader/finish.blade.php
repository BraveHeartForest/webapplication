@extends('layouts.base')

@section('title','画像アップロード完了')

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
    @if(Session::has('auth') && session('auth')==0)
    <a href="http://127.0.0.1:8000/emp">社員登録画面へ</a><br>
    <a href="http://127.0.0.1:8000/dept">部署登録画面へ</a><br>
    <a href="http://127.0.0.1:8000/list">一覧画面へ</a><br>
    <a href="http://127.0.0.1:8000/login">ログイン画面へ</a>
    @else
    <a href="http://127.0.0.1:8000/list">一覧画面へ</a><br>
    <a href="http://127.0.0.1:8000/login">ログイン画面へ</a>
    @endif
    <br>
    <a href="http://127.0.0.1:8000/upload">画像アップロードへ</a>

@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection