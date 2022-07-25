@extends('layouts.admin')
@section('title', '一人飲みのお店一覧')

@section('content')
    <div class="container">
        <h2>一人飲みのお店</h2>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $alone)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\IzakayaController@detail', ['id' => $alone->id]) }}">
                        <li><img src="{{asset('storage/image/'.$alone->image_path)}}"></li>
                        <li class="index_name">{{ $alone->store }}</li>
                        <li>{{ $alone->atmosphere }}</li>
                        </a>
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