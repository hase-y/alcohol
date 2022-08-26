@extends('layouts.admin')
@section('title', '手作りのおつまみ')

@section('content')
    <div class="container">
    <h2>手作りのおつまみ</h2>
    <br>
        <div class="row">
            <div class="zyanru-bar">
                <ul>
                    <li>ジャンル別に表示</li>
                    <li><a href = "shihan">市販品</a></li>
                    <li><a href = "tezukuri">手作り</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="list-izakaya">
            <div>
            @foreach($posts as $tezukuri)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\KnobController@detail', ['id' => $tezukuri->id]) }}">
                        <li><img src="{{asset('storage/image/'.$tezukuri->image_path)}}"></li>
                        <li class="index_name">{{ $tezukuri->product }}</li>
                        <li>{{ $tezukuri->comment }}</li>
                        </a>
                        <li>
                            <div>
                                <a class="edit" href="{{ action('Admin\KnobController@edit', ['id' => $tezukuri->id]) }}">編集</a>
                                <a class="edit" href="{{ action('Admin\KnobController@delete', ['id' => $tezukuri->id]) }}">削除</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
        <div class="page">
            {{ $posts->links() }}
        </div>
    </div>
@endsection