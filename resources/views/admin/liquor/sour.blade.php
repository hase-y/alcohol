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
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $sour->id]) }}">
                            <li><img src="{{asset('storage/image/'.$sour->image_path)}}"></li>
                            <li class="index_name">{{ $sour->name }}</li>
                            <li>{{ $sour->comment }}</li>
                        </a>
                            <li>
                                <div>
                                    @if($rogin_id === $sour->id || $rogin_id ===1)
                                    <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $sour->id]) }}">編集</a>
                                    <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $sour->id]) }}">削除</a>
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