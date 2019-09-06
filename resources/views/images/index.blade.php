@extends('layouts.base')

@section('title','画像追加')

@section('header')

@endsection


@section('content')
    @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="/images" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="file" name="photo">
    <input type="submit" value="送信">
    </form>

@endsection

@section('footer')
copyright &#169; 2019 Brave
@endsection