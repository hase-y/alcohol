@extends('layouts.front')
@section('title', '酒一覧')

@section('content')
    <div class="container">
        <h2>お酒の一覧</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="zyanru-bar">
                    <ul>
                        <li>ジャンル別に表示</li>
                        <li><a href = "liquor/beer">ビール</a></li>
                        <li><a href = "liquor/wine">ワイン</a></li>
                        <li><a href = "liquor/whiskey">ウィスキー</a></li>
                        <li><a href = "liquor/shochu">焼酎</a></li>
                        <li><a href = "liquor/sake">日本酒</a></li>
                        <li><a href = "liquor/sour">サワー</a></li>
                        <li><a href = "liquor/highball">ハイボール</a></li>
                        <li><a href = "liquor/others">その他</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8"></div>
            <div class="search col-md-4">
                <form action="{{ action('LiquorController@index') }}" method="get">
                <input type="text" class="search" name="search" placeholder="キーワードで絞り込み" value="{{ $search }}">
                <br>
                <input type="text" class="value_search" name="value_search_low" placeholder="価格で絞り込み" value="{{ $value_search_low }}">
                ～
                <input type="text" class="value_search" name="value_search_high" placeholder="価格で絞り込み" value="{{ $value_search_high }}">
                <br>
                @csrf
                <input type="submit" class="search btn btn-outline-dark" value="検索">
                <br>
                <p class="validation">{{ $errors->first() }}</p>
            </div>
        </div>
        <br>
        <br>
        <div class="list-liquor">
            <div>
            @foreach($posts as $liquor)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $liquor->id]) }}">
                            <li><img src="{{ $liquor->image_path }}"></li>
                            <li class="index_name">{{ $liquor->name }}</li>
                            <li>{{ $liquor->comment }}</li>
                        </a>
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
        <br>
        <div class="page">
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>
@endsection