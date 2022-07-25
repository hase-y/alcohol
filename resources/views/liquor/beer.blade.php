@extends('layouts.admin')
@section('title', 'ビール一覧')

@section('content')
    <div class="container">
        <h2>登録されてるビール</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $beer)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $beer->id]) }}">
                            <li><img src="{{asset('storage/image/'.$beer->image_path)}}"></li>
                            <li class="index_name">{{ $beer->name }}</li>
                            <li>{{ $beer->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection