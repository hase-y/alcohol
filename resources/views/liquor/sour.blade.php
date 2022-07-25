@extends('layouts.admin')
@section('title', 'サワー一覧')

@section('content')
    <div class="container">
        <h2>登録されてるサワー</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $sour)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $sour->id]) }}">
                            <li><img src="{{asset('storage/image/'.$sour->image_path)}}"></li>
                            <li class="index_name">{{ $sour->name }}</li>
                            <li>{{ $sour->comment }}</li>
                        </a>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection