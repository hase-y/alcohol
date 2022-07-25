@extends('layouts.admin')
@section('title', 'お店一覧')

@section('content')
    <div class="container">
            <h2>登録されてるお店</h2>
        <br>
        <div class="col-md-16">
            <a href="{{ action('Admin\IzakayaController@add') }}" role="button" class="btn btn-outline-dark">お店の登録</a>
                <div class="zyanru-bar">
                    <ul>
                        <li>用途別に表示</li>
                        <li><a href = "izakaya/alone">一人飲み</a></li>
                        <li><a href = "izakaya/others">一人飲みでない</a></li>
                    </ul>
                </div>
        </div>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $izakaya)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\IzakayaController@detail', ['id' => $izakaya->id]) }}">
                            <li><img src="{{asset('storage/image/'.$izakaya->image_path)}}"></li>
                            <li class="index_name">{{ $izakaya->store }}</li>
                            <li>{{ $izakaya->atmosphere }}</li>
                        </a>
                            <li>
                                <div>
                                    <a class="edit" href="{{ action('Admin\IzakayaController@edit', ['id' => $izakaya->id]) }}">編集</a>
                                    <a class="edit" href="{{ action('Admin\IzakayaController@delete', ['id' => $izakaya->id]) }}">削除</a>
                                </div>
                            </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection