@extends('layouts.admin')
@section('title', 'それ以外のお店一覧')

@section('content')
    <div class="container">
            <h2>それ以外のお店</h2>
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
            @foreach($posts as $others)
            　　<div class="item">
                    <ul>
                        <li><img src="{{asset('storage/image/'.$others->image_path)}}"></li>
                        <li>{{ $others->store }}</li>
                        <li>{{ $others->atmosphere }}</li>
                        <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\IzakayaController@edit', ['id' => $others->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\IzakayaController@delete', ['id' => $others->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection