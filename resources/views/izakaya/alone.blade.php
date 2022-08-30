@extends('layouts.front')
@section('title', '一人飲みのお店一覧')

@section('content')
    <div class="container">
    <h2>一人飲み向きのお店の一覧</h2>
    <br>
        <div class="row">
            <div class="zyanru-bar">
                <ul>
                    <li>用途別に表示</li>
                    <li><a href = "alone">一人飲み向き</a></li>
                    <li><a href = "others">一人飲み向きでない</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="list-izakaya">
            <div>
            @foreach($posts as $alone)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('IzakayaController@detail', ['id' => $alone->id]) }}">
                        <li><img src="{{ $alone->image_path }}"></li>
                        <li class="index_name">{{ $alone->store }}</li>
                        <li>{{ $alone->atmosphere }}</li>
                        </a>
                    </ul>
        　　    </div>
            @endforeach
            </div>
        </div>
        <br>
        <div class="page">
            {{ $posts->links() }}
        </div>
    </div>
@endsection