@extends('layouts.front')
@section('title', 'ホーム')

@section('content')
    <div class="container">
        <h2>一人飲みを支援し合うサイト</h2>
        <br>
        <div class="col-md-16">
            <div class="home-menu-bar">
                <ul>
                    <li class="index_name">メニュー</li>
                    <li><a href = "liquor">お酒</a></li>
                    <li><a href = "izakaya">居酒屋</a></li>
                    <li><a href = "knob">おつまみ</a></li>
                    <li><a href = "mypage">マイページ</a></li>
                    <li><a href = "register">会員登録</a></li>
                </ul>
            </div>
        </div>
        <br>
    </div>
    <div class="list-izakaya">
        @foreach($posts_mix as $mix)
            <div class="item">
                <ul>
                    <!--<li><img src="{{asset('storage/image/'.$mix->image_path)}}"></li>-->
                    <!--<li class="index_name">{{ $mix->store }}</li>-->
                    <li>{{ $mix->zyanru }}</li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection