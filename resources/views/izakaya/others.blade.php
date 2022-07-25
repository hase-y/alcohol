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
@endsection