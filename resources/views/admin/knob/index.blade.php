@extends('layouts.admin')
@section('title', 'つまみ一覧')

@section('content')
    <div class="container">
        <h2>登録されてるおつまみ</h2>
        <br>
        <div class="col-md-16">
            <a href="{{ action('Admin\KnobController@add') }}" role="button" class="btn btn-outline-dark">おつまみの登録</a>
                <div class="zyanru-bar">
                    <ul>
                        <li>ジャンル別に表示</li>
                        <li><a href>市販品</a></li>
                        <li><a href>手作り</a></li>
                    </ul>
                </div>
        </div>
        <br>
        <div class="list-knob">
            @foreach($posts as $knob)
            　　<div class="item">
                    <ul>
                        <li><img src="{{asset('storage/image/'.$knob->image_path)}}"></li>
                        <li>{{ $knob->product }}</li>
                        <li>{{ $knob->cooking }}</li>
                        <li>{{ $knob->comment }}</li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection