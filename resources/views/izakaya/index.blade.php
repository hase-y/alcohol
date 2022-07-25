@extends('layouts.front')
@section('title', 'お店一覧')

@section('content')
    <div class="container">
            <h2>登録されてるお店</h2>
        <br>
        <div class="col-md-16">
            <div class="zyanru-bar">
                <ul>
                    <li>用途別に表示</li>
                    <li><a href = "izakaya/alone">一人飲み向き</a></li>
                    <li><a href = "izakaya/others">一人飲み向きでない</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $izakaya)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('IzakayaController@detail', ['id' => $izakaya->id]) }}">
                        <li><img src="{{asset('storage/image/'.$izakaya->image_path)}}"></li>
                        <li class="index_name">{{ $izakaya->store }}</li>
                        <li>{{ $izakaya->atmosphere }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection