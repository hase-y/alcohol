@extends('layouts.admin')
@section('title', '一人飲みのお店一覧')

@section('content')
    <div class="container">
    <h2>一人飲みのお店</h2>
    <br>
        <div class="row">
            <div class="zyanru-bar">
                <ul>
                    <li>用途別に表示</li>
                    <li><a href = "alone">一人飲み</a></li>
                    <li><a href = "others">一人飲みでない</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="list-izakaya">
            <div>
            @foreach($posts as $alone)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\IzakayaController@detail', ['id' => $alone->id]) }}">
                        <li><img src="{{ $alone->image_path }}"></li>
                        <li class="index_name">{{ $alone->store }}</li>
                        <li>{{ $alone->atmosphere }}</li>
                        </a>
                        <li>
                            <div>
                                @if($rogin_id === $alone->id || $rogin_id ===1)
                                <a class="edit" href="{{ action('Admin\IzakayaController@edit', ['id' => $alone->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\IzakayaController@delete', ['id' => $alone->id]) }}">削除</a>
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