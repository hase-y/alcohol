@extends('layouts.admin')
@section('title', '酒一覧')

@section('content')
    <div class="container">
        <h2>お酒の一覧</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
            <a href="{{ action('Admin\LiquorController@add') }}" role="button" class="btn btn-outline-dark">お酒の登録</a>
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
        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="search col-md-4">
                <form action="{{ action('Admin\LiquorController@index') }}" method="get">
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
        <div class="list-liquor">
            <div>
            @foreach($posts as $liquor)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('Admin\LiquorController@detail', ['id' => $liquor->id]) }}">
                            <!--<li><img src="{{asset('storage/image/'.$liquor->image_path)}}"></li>-->
                            <li><img src="{{ $liquor->image_path }}"></li>
                            <li class="index_name">{{ $liquor->name }}</li>
                            <li>{{ $liquor->comment }}</li>
                        </a>
                        <li>
                            <div>
                                @if($rogin_id === $liquor->user_id || $rogin_id ===1)
                                <a class="edit" href="{{ action('Admin\LiquorController@edit', ['id' => $liquor->id]) }}">編集</a>
                                <a class="delete" href="{{ action('Admin\LiquorController@delete', ['id' => $liquor->id]) }}">削除</a>
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
        <div class="page">
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>
@endsection