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
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $whiskey->id]) }}">
                            <li><img src="{{asset('storage/image/'.$whiskey->image_path)}}"></li>
                            <li class="index_name">{{ $whiskey->name }}</li>
                            <li>{{ $whiskey->comment }}</li>
                        </a>
                            <li>
                                <div>
                                    @if($rogin_id === $whiskey->id || $rogin_id ===1)
                                    <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $whiskey->id]) }}">編集</a>
                                    <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $whiskey->id]) }}">削除</a>
                                    @else
                                    <a class="edit">編集</a>
                                    <a class="delete">削除</a>
                                    @endif
                                </div>
                            </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection