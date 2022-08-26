@extends('layouts.front')
@section('title', '市販のおつまみ')

@section('content')
    <div class="container">
    <h2>市販のおつまみ</h2>
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
            @foreach($posts as $shihan)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('KnobController@detail', ['id' => $shihan->id]) }}">
                        <li><img src="{{asset('storage/image/'.$shihan->image_path)}}"></li>
                        <li class="index_name">{{ $shihan->product }}</li>
                        <li>{{ $shihan->comment }}</li>
                        </a>
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