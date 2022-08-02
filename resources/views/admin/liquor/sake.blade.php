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
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $sake->id]) }}">
                            <li><img src="{{asset('storage/image/'.$sake->image_path)}}"></li>
                            <li class="index_name">{{ $sake->name }}</li>
                            <li>{{ $sake->comment }}</li>
                        </a>
                            <li>
                                <div>
                                    @if($rogin_id === $sake->id || $rogin_id ===1)
                                    <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $sake->id]) }}">編集</a>
                                    <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $sake->id]) }}">削除</a>
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