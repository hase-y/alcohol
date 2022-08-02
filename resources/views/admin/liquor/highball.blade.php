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
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $highball->id]) }}">
                            <li><img src="{{asset('storage/image/'.$highball->image_path)}}"></li>
                            <li class="index_name">{{ $highball->name }}</li>
                            <li>{{ $highball->comment }}</li>
                        </a>
                            <li>
                                <div>
                                    @if($rogin_id === $highball->id || $rogin_id ===1)
                                    <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $highball->id]) }}">編集</a>
                                    <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $highball->id]) }}">削除</a>
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