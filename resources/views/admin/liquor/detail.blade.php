{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'お酒の詳細')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <script src="{{ asset('/js/nice.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おすすめ酒の詳細</h2>
                <form action="{{ action('Admin\LiquorController@detail') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="oya">
                        <div class="liquor_image">
                                <!--<input type="file" class="form-control-file" name="image">-->
                                <div class="form-text text-info">
                                    <!--<img src="{{asset('storage/image/'.$liquor_form->image_path)}}">-->
                                    <img src="{{asset($liquor_form->image_path)}}">
                                </div>
                        </div>
                        <br>
                        <div class="liquor_explanation">
                            <label class="col-md-20">ジャンル</label>
                            <div class="col-md-30">
                                <a>　{{ $liquor_form->zyanru }}</a>
                            </div>
                            <br>
                            <label class="col-md-20">お酒の名前</label>
                            <div class="col-md-30">
                                <a>　{{ $liquor_form->name }}</a>
                            </div>
                            <br>
                            <label class="col-md-20">コメント</label>
                            <div class="col-md-30">
                                <a>　{{ $liquor_form->comment }}</a>
                            </div>
                            <br>
                            <label class="col-md-20">価格</label>
                            <div class="col-md-30">
                                <a>　{{ $liquor_form->value }}　円</a>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                    <span>
                        <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                        @if($nice)
                        <!-- 「いいね」取消用ボタンを表示 -->
                        <div class="good">
                            <ul>
                                <a href="{{ route('unnice', $liquor) }}">
                                	<li><img src="https://alcohollover.s3.ap-northeast-1.amazonaws.com/XKMh3BiLFKbjaGnq53njgM9E3LBCbjM23ia5SIEf.jpg"></li>
                                	<!-- 「いいね」の数を表示 -->
                                	<li>いいね
                                    	<span class="badge">
                                    		{{ $liquor->nices->count() }}
                                    	</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                        @else
                        <form method = "POST" action= "/detail/nice">
                        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        <div class="good">
                            <ul class="nice">
                                <button onclick="nice({{$liquor}})">
                                    <li><img src="https://alcohollover.s3.ap-northeast-1.amazonaws.com/IchuOb76Clji4UPixUilhgHfrgt3yKRBaONI65cO.jpg"></li>
                                	<!--「いいね」の数を表示 -->
                                	<li>いいね
                                	    <span class="badge">
                                	        {{ $liquor->nices->count() }}
                                	    </span>
                                	</li>
                                </button>
                            </ul>
                        </div>
                        </form>
                        @endif
                    </span>
             </div>
        </div>
    </div>
@endsection