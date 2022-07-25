@extends('layouts.admin')
@section('title', 'ワイン一覧')

@section('content')
    <div class="container">
            <h2>登録されてるワイン</h2>
        <br>
        <!--<div class="col-md-16">-->
        <!--    <a href="{{ action('Admin\LiquorController@add') }}" role="button" class="btn btn-outline-dark">お酒の登録</a>-->
        <!--        <div class="zyanru-bar">-->
        <!--            <ul>-->
        <!--                <li>ジャンル別に表示</li>-->
        <!--                <li><a href>ビール</a></li>-->
        <!--                <li><a href>ワイン</a></li>-->
        <!--                <li><a href>ウィスキー</a></li>-->
        <!--                <li><a href>焼酎</a></li>-->
        <!--                <li><a href>日本酒</a></li>-->
        <!--                <li><a href>サワー</a></li>-->
        <!--                <li><a href>ハイボール</a></li>-->
        <!--                <li><a href>その他</a></li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--</div>-->
        <!--<br>-->
        <div class="list-liquor">
            @foreach($posts as $wine)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $wine->id]) }}">
                            <li><img src="{{asset('storage/image/'.$wine->image_path)}}"></li>
                            <li class="index_name">{{ $wine->name }}</li>
                            <li>{{ $wine->comment }}</li>
                        </a>
                            <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $wine->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\LiquorController@delete', ['id' => $wine->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection