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
@endsection