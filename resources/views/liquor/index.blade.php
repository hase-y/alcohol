@extends('layouts.front')
@section('title', '酒一覧')

@section('content')
    <div class="container">
            <h2>登録されてるお酒</h2>
        <br>
        <div class="col-md-16">
            <a href="{{ action('Admin\LiquorController@add') }}" role="button" class="btn btn-outline-dark">お酒の登録</a>
                <div class="zyanru-bar">
                    <ul>
                        <li>ジャンル別に表示</li>
                        <li><a href>ビール</a></li>
                        <li><a href>ワイン</a></li>
                        <li><a href>ウィスキー</a></li>
                        <li><a href>焼酎</a></li>
                        <li><a href>日本酒</a></li>
                        <li><a href>サワー</a></li>
                        <li><a href>ハイボール</a></li>
                        <li><a href>その他</a></li>
                    </ul>
                </div>
        </div>
        <br>
        <div class="list-liquor">
            @foreach($posts as $liquor)
            　　<div class="item">
                    <ul>
                        <li><img src="{{asset('storage/image/'.$liquor->image_path)}}"></li>
                        <a>『<li>{{ $liquor->name }}</li>』</a>
                        <li>{{ $liquor->comment }}</li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection