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

@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection