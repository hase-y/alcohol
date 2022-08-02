@extends('layouts.admin')
@section('title', '一人飲みでないお店一覧')

@section('content')
    <div class="container">
        <h2>一人飲みでないお店</h2>
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
                                @if($rogin_id === $others->id || $rogin_id ===1)
                                <a class="edit" href="{{ action('Admin\IzakayaController@edit', ['id' => $others->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\IzakayaController@delete', ['id' => $others->id]) }}">削除</a>
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
@endsection