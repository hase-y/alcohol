@extends('layouts.front')
@section('title', 'お店一覧')

@section('content')
    <div class="container">
        <h2>お店の一覧</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="zyanru-bar">
                    <ul>
                        <li>用途別に表示</li>
                        <li><a href = "izakaya/alone">一人飲み向き</a></li>
                        <li><a href = "izakaya/others">一人飲み向きでない</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8"></div>
            <div class="search col-md-4">
                <form action="{{ action('IzakayaController@index') }}" method="get">
                <input type="text" class="search" name="search" value="{{ $search }}">
                 @csrf
                <input type="submit" class="btn btn-outline-dark" value="検索">
            </div>
        </div>
        <br>
        <br>
        <div class="list-izakaya">
            <div>
            @foreach($posts as $izakaya)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('IzakayaController@detail', ['id' => $izakaya->id]) }}">
                            <li><img src="{{asset('storage/image/'.$izakaya->image_path)}}"></li>
                            <li class="index_name">{{ $izakaya->store }}</li>
                            <li>{{ $izakaya->comment }}</li>
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