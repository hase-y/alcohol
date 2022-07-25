@extends('layouts.admin')
@section('title', '市販のおつまみ')

@section('content')
    <div class="container">
        <h2>市販のおつまみ</h2>
        <br>
        <div class="list-izakaya">
            @foreach($posts as $shihan)
            　　<div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\KnobController@detail', ['id' => $shihan->id]) }}">
                        <li><img src="{{asset('storage/image/'.$shihan->image_path)}}"></li>
                        <li class="index_name">{{ $shihan->product }}</li>
                        <li>{{ $shihan->comment }}</li>
                        </a>
                        <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\KnobController@edit', ['id' => $shihan->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\KnobController@delete', ['id' => $shihan->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
            　　</div>
            @endforeach
        </div>
    </div>
@endsection