@extends('layouts.admin')
@section('title', '焼酎一覧')

@section('content')
    <div class="container">
            <h2>登録されてる焼酎</h2>
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
            @foreach($posts as $shochu)
            　　<div class="item">
                    <ul>
                        <li><img src="{{asset('storage/image/'.$shochu->image_path)}}"></li>
                        <li>{{ $shochu->name }}</li>
                        <li>{{ $shochu->comment }}</li>
                        <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $shochu->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\LiquorController@delete', ['id' => $shochu->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection