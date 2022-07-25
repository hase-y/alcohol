@extends('layouts.admin')
@section('title', '焼酎一覧')

@section('content')
    <div class="container">
        <h2>登録されてる焼酎</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $shochu)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $shochu->id]) }}">
                            <li><img src="{{asset('storage/image/'.$shochu->image_path)}}"></li>
                            <li class="index_name">{{ $shochu->name }}</li>
                            <li>{{ $shochu->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection