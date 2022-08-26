@extends('layouts.front')
@section('title', '日本酒一覧')

@section('content')
    <div class="container">
    <h2>登録されてる日本酒一覧</h2>
    <br>
    <div class="row">
            <div class="zyanru-bar">
                <ul>
                    <li>ジャンル別に表示</li>
                    <li><a href = "beer">ビール</a></li>
                    <li><a href = "wine">ワイン</a></li>
                    <li><a href = "whiskey">ウィスキー</a></li>
                    <li><a href = "shochu">焼酎</a></li>
                    <li><a href = "sake">日本酒</a></li>
                    <li><a href = "sour">サワー</a></li>
                    <li><a href = "highball">ハイボール</a></li>
                    <li><a href = "others">その他</a></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="list-liquor">
            <div>
            @foreach($posts as $sake)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $sake->id]) }}">
                        <li><img src="{{asset('storage/image/'.$sake->image_path)}}"></li>
                        <li class="index_name">{{ $sake->name }}</li>
                        <li>{{ $sake->comment }}</li>
                        </a>
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
        <br>
        <div class="page">
            {{ $posts->links() }}
        </div>
    </div>
@endsection