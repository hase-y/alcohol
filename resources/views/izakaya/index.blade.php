@extends('layouts.front')
@section('title', 'お店一覧')

@section('content')
    <div class="container">
            <h2>登録されてるお店</h2>
        <br>
        <div class="col-md-16">
            <a href="{{ action('Admin\IzakayaController@add') }}" role="button" class="btn btn-outline-dark">お店の登録</a>
                <div class="zyanru-bar">
                    <ul>
                        <li>用途別に表示</li>
                        <li><a href>一人飲み</a></li>
                        <li><a href>それ以外</a></li>
                    </ul>
                </div>
        </div>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $izakaya)
            　　<div class="item">
                    <ul>
                        <li><img src="{{asset('storage/image/'.$izakaya->image_path)}}"></li>
                        <li>{{ $izakaya->store }}</li>
                        <li>{{ $izakaya->atmosphere }}</li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection