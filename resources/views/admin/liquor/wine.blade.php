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
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $wine->id]) }}">
                            <li><img src="{{asset('storage/image/'.$wine->image_path)}}"></li>
                            <li class="index_name">{{ $wine->name }}</li>
                            <li>{{ $wine->comment }}</li>
                        </a>
                            <li>
                            <div>
                                @if($rogin_id === $wine->id || $rogin_id ===1)
                                <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $wine->id]) }}">編集</a>
                                <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $wine->id]) }}">削除</a>
                                @else
                                <a class="edit">編集</a>
                                <a class="delete">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection