@extends('layouts.admin')
@section('title', 'それ以外のお店一覧')

@section('content')
    <div class="container">
        <h2>それ以外のお店</h2>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $others)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\IzakayaController@detail', ['id' => $others->id]) }}">
                        <li><img src="{{asset('storage/image/'.$others->image_path)}}"></li>
                        <li class="index_name">{{ $others->store }}</li>
                        <li>{{ $others->atmosphere }}</li>
                        </a>
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