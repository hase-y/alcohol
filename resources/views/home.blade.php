@extends('layouts.front')
@section('title', 'ホーム')

@section('content')
    <div class="container">
        <h2>お酒好きのサイト</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="home-zyanru-bar">
                    <ul>
                        <li class="index_name">メニュー</li>
                        <li><a href = "liquor">お酒</a></li>
                        <li><a href = "izakaya">居酒屋</a></li>
                        <li><a href = "knob">おつまみ</a></li>
                        <li><a = "mypage">マイページ</a></li>
                        @guest
                        <li><a href = "register">会員登録</a></li>
                        @else
                        <li><a = "register">会員登録</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
          $('.list-liquor, .list-izakaya, .list-knob').slick({
            autoplay: true, 
            infinite: true, 
            dots: true, 
            slidesToShow: 6, 
            slidesToScroll: 6,
            responsive: [{
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              }
            }, {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
              }
            }]
          });
        });
        </script>
        <div class="list-liquor">
            @foreach($posts_liquor as $liquor)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('LiquorController@detail', ['id' => $liquor->id]) }}">
                            <li><img src="{{ $liquor->image_path }}"></li>
                            <li class="index_name">{{ $liquor->name }}</li>
                        </a>
                    </ul>
                </div>
            @endforeach
        </div>
        <br>
        <div class="list-izakaya">
            @foreach($posts_izakaya as $izakaya)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('IzakayaController@detail', ['id' => $izakaya->id]) }}">
                            <li><img src="{{ $izakaya->image_path }}"></li>
                            <li class="index_name">{{ $izakaya->store }}</li>
                        </a>
                    </ul>
                </div>
            @endforeach
        </div>
        <br>
        <div class="list-knob">
            @foreach($posts_knob as $knob)
                <div class="item">
                    <ul>
                        <a class = "detail" href = "{{ action('KnobController@detail', ['id' => $knob->id]) }}">
                            <li><img src="{{ $knob->image_path }}"></li>
                            <li class="index_name">{{ $knob->product }}</li>
                        </a>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection