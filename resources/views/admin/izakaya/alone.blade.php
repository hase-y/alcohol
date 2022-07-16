@extends('layouts.admin')
@section('title', '一人飲みのお店一覧')

@section('content')
    <div class="container">
            <h2>一人飲みのお店</h2>
        <br>
        <!--<div class="col-md-16">-->
        <!--    <a href="{{ action('Admin\IzakayaController@add') }}" role="button" class="btn btn-outline-dark">お店の登録</a>-->
        <!--        <div class="zyanru-bar">-->
        <!--            <ul>-->
        <!--                <li>用途別に表示</li>-->
        <!--                <li><a href>一人飲み</a></li>-->
        <!--                <li><a href>それ以外</a></li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--</div>-->
        <!--<br>-->
        <div class="list-izakaya">
            @foreach($posts as $alone)
            　　<div class="item">
                    <ul>
                        <li><img src="{{asset('storage/image/'.$alone->image_path)}}"></li>
                        <li>{{ $alone->store }}</li>
                        <li>{{ $alone->atmosphere }}</li>
                        <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\IzakayaController@edit', ['id' => $alone->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\IzakayaController@delete', ['id' => $alone->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection