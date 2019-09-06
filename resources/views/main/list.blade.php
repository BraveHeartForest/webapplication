@extends('layouts.base')

@section('title','一覧')

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
    <div>
        <form method="GET">
            <input type="text" name="seartch" id="search">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th>名前</th>
                <th>性別</th>
                <th>住所</th>
                <th>生年月日</th>
                <th>所属部署</th>
                <th>変更</th>
                @if(session('auth')==0)
                <th>削除</th>
                @endif
            </tr>
            @foreach($elements as $element)
            <tr>
                <td>{{$element->emp_name}}</td>
                <td>{{$element->gender==0 ?'男':'女'}}</td>
                <td>{{$element->address}}</td>
                <td>{{$element->birthday}}</td>
                <td>{{$element->dept_name}}</td>
                <td>
                    <form action="/update?id={{$element->emp_id}}" method="POST">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        @if(session('auth')==0)
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-edit"></i>変更
                        </button>
                        @elseif(session('emp_id')==$element->emp_id)
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-edit"></i>変更
                        </button>
                        @endif
                    </form>
                </td>
                @if(session('auth')==0)
                <td>
                    <form action="/delete?id={{$element->emp_id}}" method="POST">
                        {{ csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return window.confirm('削除しますか？');" class="btn btn-danger">
                            <i class="fa fa-trash"></i>削除
                        </button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </table>
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