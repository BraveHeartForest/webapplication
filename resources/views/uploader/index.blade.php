@extends('layouts.base')

@section('title','画像アップロード')

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

    <h3>プロフィール画像</h3>
    <div>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
    @if( $errors->has('username'))
        <li>{{$errors->first('username')}}</li>
    @endif
    <label for="username">名前：</label>
    <input type="text" name="username" id="username"><br>
    @if( $errors->has('thum'))
        <li>{{$errors->first('thum')}}</li>
    @endif
    <label for="thum">サムネイル画像(150&times;50)：</label>
    <input type="file" name="thum" id="thum"><br>
    <input type="submit" value="確認">
    </form>
    </div>
    @if(count($uploaders)>0)
    <table>
        <tr>
            <th>名前</th>
            <th>サムネイル</th>
            <th>削除ボタン</th>
        </tr>
        @foreach($uploaders as $uploader)
        <tr>
            <td>{{$uploader->username ?: "削除されています。"}}</td>
            <td><img src="{{ asset('/storage/img/'.$uploader->id) }}/{{ $pict[$uploader->id] }}" alt="id={{ $uploader->id}}がデータベースに残っています。"></td>
            {{-- https://promidea.co.jp/archives/2377 --}}
            <td>
                <form action="/upload?id={{$uploader->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" onclick="return window.confirm('削除しますか？');" class="btn btn-danger">
                        <i class="fa fa-trash"></i>削除
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="itigyou">
    {{$uploaders->render()}}
    </div><br>
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