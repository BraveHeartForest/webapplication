@extends('layouts.base')

@section('title','一覧')

@section('header')
    <ul class="list-inline header">
        <li class="itigyou">ようこそXXX＝サン</li>
        <li class="itigyou">ログアウト</li>
    </ul>
@endsection


@section('content')
<br>
{{$dept_id}}
<br>
{{$elements->dept_id}}
@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection