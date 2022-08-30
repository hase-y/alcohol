@extends('layouts.admin')
@section('title', 'お店一覧')

@section('content')
    <div class="container">
    <h2>お店の一覧</h2>
    <br>
        <div class="row">
            <div class="col-md-12">
            <a href="{{ action('Admin\IzakayaController@add') }}" role="button" class="btn btn-outline-dark">お店の登録</a>
                <div class="zyanru-bar">
                    <ul>
                        <li>用途別に表示</li>
                        <li><a href = "izakaya/alone">一人飲み</a></li>
                        <li><a href = "izakaya/others">一人飲みでない</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="search col-md-4">
                <form action="{{ action('Admin\IzakayaController@index') }}" method="get">
                <input type="text" class="search" name="search" value="{{ $search }}">
                @csrf
                <input type="submit" class="btn btn-outline-dark" value="検索">
            </div>
        </div>
        <br>
        <div class="list-izakaya">
            <div>
            @foreach($posts as $izakaya)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\IzakayaController@detail', ['id' => $izakaya->id]) }}">
                            <li><img src="{{ $izakaya->image_path }}"></li>
                            <li class="index_name">{{ $izakaya->store }}</li>
                            <li>{{ $izakaya->atmosphere }}</li>
                        </a>
                        <li>
                            <div>
                                @if($rogin_id === $izakaya->user_id || $rogin_id ===1)
                                <a class="edit" href="{{ action('Admin\IzakayaController@edit', ['id' => $izakaya->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\IzakayaController@delete', ['id' => $izakaya->id]) }}">削除</a>
                                @else
                                <a class="edit">編集</a>
                                <a class="delete">削除</a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
        <div class="page">
            {{ $posts->links() }}
        </div>
    </div>
@endsection