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
                        <a class = "detail" href = "{{ action('IzakayaController@detail', ['id' => $alone->id]) }}">
                        <li><img src="{{asset('storage/image/'.$alone->image_path)}}"></li>
                        <li class="index_name">{{ $alone->store }}</li>
                        <li>{{ $alone->atmosphere }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection