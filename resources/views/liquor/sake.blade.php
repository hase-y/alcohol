@extends('layouts.admin')
@section('title', '日本酒一覧')

@section('content')
    <div class="container">
        <h2>登録されてる日本酒</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $sake)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $sake->id]) }}">
                            <li><img src="{{asset('storage/image/'.$sake->image_path)}}"></li>
                            <li class="index_name">{{ $sake->name }}</li>
                            <li>{{ $sake->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection