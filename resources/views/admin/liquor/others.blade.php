@extends('layouts.admin')
@section('title', 'その他一覧')

@section('content')
    <div class="container">
            <h2>登録されてるお酒（その他）</h2>
        <br>
        <div class="list-liquor">
            @foreach($posts as $others)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $others->id]) }}">
                            <li><img src="{{asset('storage/image/'.$others->image_path)}}"></li>
                            <li class="index_name">{{ $others->name }}</li>
                            <li>{{ $others->comment }}</li>
                        </a>
                            <li>
                                <div>
                                    @if($rogin_id === $others->id || $rogin_id ===1)
                                    <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $others->id]) }}">編集</a>
                                    <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $others->id]) }}">削除</a>
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