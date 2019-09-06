@extends('layouts.base')

@section('title','Add')

@section('header')
    <ul class="list-inline header">
        @if(session('user')==null)
        <li class="itigyou">ようこそXXX＝サン</li>
        @else
        <li class="itigyou">ようこそ{{session('user')}}＝サン</li>
        @endif
        <li class="itigyou">ログアウト</li>
    </ul>
@endsection


@section('content')
{{session()}}
@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection