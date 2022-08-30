@extends('layouts.front')
@section('title', '手作りのおつまみ')

@section('content')
    <div class="container">
    <h2>手作りのおつまみ</h2>
    <br>
        <div class="row">
            <div class="zyanru-bar">
                <ul>
                    <li>ジャンル別に表示</li>
                    <li><a href = "shihan">市販品</a></li>
                    <li><a href = "tezukuri">手作り</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="list-izakaya">
            <div>
            @foreach($posts as $tezukuri)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('KnobController@detail', ['id' => $tezukuri->id]) }}">
                        <li><img src="{{ $tezukuri->image_path }}"></li>
                        <li class="index_name">{{ $tezukuri->product }}</li>
                        <li>{{ $tezukuri->comment }}</li>
                        </a>
                    </ul>
                </div>
            @endforeach
            <div>
        </div>
        <div class="page">
            {{ $posts->links() }}
        </div>
    </div>
@endsection