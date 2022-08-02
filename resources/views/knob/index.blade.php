@extends('layouts.admin')
@section('title', 'つまみ一覧')

@section('content')
    <div class="container">
        <h2>登録されてるおつまみ</h2>
           <div class="zyanru-bar">
                <ul>
                    <li>ジャンル別に表示</li>
                    <li><a href = "shihan">市販品</a></li>
                    <li><a href = "tezukuri">手作り</a></li>
                </ul>
            </div>
        </div>
        <br>
        <br>
        <div class="list-knob">
            @foreach($posts as $knob)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('KnobController@detail', ['id' => $knob->id]) }}">
                            <li><img src="{{asset('storage/image/'.$knob->image_path)}}"></li>
                            <li class="index_name">{{ $knob->product }}</li>
                            <li>{{ $knob->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection