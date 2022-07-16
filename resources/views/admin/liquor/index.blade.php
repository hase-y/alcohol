@extends('layouts.admin')
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
                        <li><a href = "liquor/beer">ビール</a></li>
                        <li><a href = "liquor/wine">ワイン</a></li>
                        <li><a href = "liquor/whiskey">ウィスキー</a></li>
                        <li><a href = "liquor/shochu">焼酎</a></li>
                        <li><a href = "liquor/sake">日本酒</a></li>
                        <li><a href = "liquor/sour">サワー</a></li>
                        <li><a href = "liquor/highball">ハイボール</a></li>
                        <li><a href = "liquor/others">その他</a></li>
                    </ul>
                </div>
        </div>
        <br>
        <div class="list-liquor">
            @foreach($posts as $liquor)
            　　<div class="item">
                    <ul>
                        <a class = "liquor_detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $liquor->id]) }}">
                            <li><img src="{{asset('storage/image/'.$liquor->image_path)}}"></li>
                            <li>{{ $liquor->name }}</li>
                            <li>{{ $liquor->comment }}</li>
                        </a>
                        <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $liquor->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\LiquorController@delete', ['id' => $liquor->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection