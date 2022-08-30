@extends('layouts.front')
@section('title', 'つまみ一覧')

@section('content')
    <div class="container">
        <h2>おつまみの一覧</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="zyanru-bar">
                    <ul>
                        <li>ジャンル別に表示</li>
                        <li><a href = "knob/shihan">市販品</a></li>
                        <li><a href = "knob/tezukuri">手作り</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8"></div>
            <div class="search col-md-4">
                <form action="{{ action('KnobController@index') }}" method="get">
                <input type="text" class="search" name="search" value="{{ $search }}">
                @csrf
                <input type="submit" class="btn btn-outline-dark" value="検索">
            </div>
        </div>
        <br>
        <br>
        <div class="list-knob">
            <div>
            @foreach($posts as $knob)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('KnobController@detail', ['id' => $knob->id]) }}">
                        <li><img src="{{ $knob->image_path }}"></li>
                        <li class="index_name">{{ $knob->product }}</li>
                        <li>{{ $knob->comment }}</li>
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