@extends('layouts.admin')
@section('title', 'ハイボール一覧')

@section('content')
    <div class="container">
        <h2>登録されてるハイボール</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $highball)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $highball->id]) }}">
                            <li><img src="{{asset('storage/image/'.$highball->image_path)}}"></li>
                            <li class="index_name">{{ $highball->name }}</li>
                            <li>{{ $highball->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection