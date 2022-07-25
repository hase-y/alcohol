@extends('layouts.admin')
@section('title', 'その他一覧')

@section('content')
    <div class="container">
        <h2>登録されてるその他</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $others)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $others->id]) }}">
                            <li><img src="{{asset('storage/image/'.$others->image_path)}}"></li>
                            <li class="index_name">{{ $others->name }}</li>
                            <li>{{ $others->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection