@extends('layouts.base')

@section('title','画像確認')

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

    <h3>プロフィール画像confirm</h3>
    <div>
    <form action="upload" method="POST">
        {{method_field('PUT')}}
        {{csrf_field()}}
    <label for="username">名前：{{$hash["username"]}}</label>
    <input type="hidden" name="username" id="username" value="{{$hash['username']}}"><br>
    <label for="thum">サムネイル画像(150&times;50)：</label>
    <input type="hidden" name="thum" id="thum" value="{{$hash['thum']}}"><br>
    {{$hash["thum"]}}<br>
    <input type="submit" value="登録">
    </form>
    </div>

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