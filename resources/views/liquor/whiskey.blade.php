@extends('layouts.admin')
@section('title', 'ウイスキー一覧')

@section('content')
    <div class="container">
        <h2>登録されてるウイスキー</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $whiskey)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $whiskey->id]) }}">
                            <li><img src="{{asset('storage/image/'.$whiskey->image_path)}}"></li>
                            <li class="index_name">{{ $whiskey->name }}</li>
                            <li>{{ $whiskey->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection