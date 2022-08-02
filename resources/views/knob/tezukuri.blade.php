@extends('layouts.admin')
@section('title', '手作りのおつまみ')

@section('content')
    <div class="container">
        <h2>手作りのおつまみ</h2>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $tezukuri)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('KnobController@detail', ['id' => $tezukuri->id]) }}">
                        <li><img src="{{asset('storage/image/'.$tezukuri->image_path)}}"></li>
                        <li class="index_name">{{ $tezukuri->product }}</li>
                        <li>{{ $tezukuri->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection