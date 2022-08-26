@extends('layouts.front')
@section('title', '一人飲み向きでないお店一覧')

@section('content')
    <div class="container">
    <h2>一人飲み向きでないお店の一覧</h2>
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
            @foreach($posts as $others)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('IzakayaController@detail', ['id' => $others->id]) }}">
                        <li><img src="{{asset('storage/image/'.$others->image_path)}}"></li>
                        <li class="index_name">{{ $others->store }}</li>
                        <li>{{ $others->atmosphere }}</li>
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