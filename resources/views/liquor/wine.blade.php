@extends('layouts.admin')
@section('title', 'ワイン一覧')

@section('content')
    <div class="container">
        <h2>登録されてるワイン</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $wine)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $wine->id]) }}">
                            <li><img src="{{asset('storage/image/'.$wine->image_path)}}"></li>
                            <li class="index_name">{{ $wine->name }}</li>
                            <li>{{ $wine->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection