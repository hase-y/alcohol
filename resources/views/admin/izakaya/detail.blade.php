{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'お店の詳細')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お店の詳細</h2>
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <br>
                <div class="oya">
                    <div class="izakaya_image">
                        <div class="form-text text-info">
                            <img src="{{ $izakaya_form->image_path }}">
                        </div>
                    </div>
                    <div class="izakaya_explanation">
                        <label class="col-md-20">店名</label>
                        <div class="col-md-30">
                            <a>　{{ $izakaya_form->store }}</a>
                        </div>
                        <br>
                        <label class="col-md-20">用途</label>
                        <div class="col-md-30">
                            <a>　{{ $izakaya_form->use }}</a>
                        </div>
                        <br>
                        <label class="col-md-20">雰囲気</label>
                        <div class="col-md-30">
                            <a>　{{ $izakaya_form->atmosphere }}</a>
                        </div>
                        <br>
                        <label class="col-md-20">ジャンル</label>
                        <div class="col-md-30">
                            <a>　{{ $izakaya_form->zyanru }}</a>
                        </div>
                        <br>
                        <label class="col-md-20">おすすめの一品</label>
                        <div class="col-md-30">
                            <a>　{{ $izakaya_form->recommendation }}</a>
                        </div>
                        <br>
                        <label class="col-md-20">コメント</label>
                        <div class="col-md-30">
                            <a>　{{ $izakaya_form->comment }}</a>
                        </div>
                    </div>
                </div>
                <span>
                    <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                    @if($nice_izakaya)
                    <!-- 「いいね」取消用ボタンを表示 -->
                    <div class="good">
                        <ul>
                            <a href="{{ route('unnice_izakaya', $izakaya) }}">
                        	    <li><img src="https://alcohollover.s3.ap-northeast-1.amazonaws.com/XKMh3BiLFKbjaGnq53njgM9E3LBCbjM23ia5SIEf.jpg"></li>
                                <!-- 「いいね」の数を表示 -->
                                <li>いいね
                        	        <span class="badge">
                        		        {{ $izakaya->nice_izakayas->count() }}
                        	        </span>
                                </li>
                            </a>
                        </ul>
                    </div>
                    @else
                    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                    <div class="good">
                        <ul>
                            <a href="{{ route('nice_izakaya', $izakaya) }}">
                    	        <li><img src="https://alcohollover.s3.ap-northeast-1.amazonaws.com/IchuOb76Clji4UPixUilhgHfrgt3yKRBaONI65cO.jpg"></li>
                            	<!--「いいね」の数を表示 -->
                            	<li>いいね
                    	            <span class="badge">
                    	                {{ $izakaya->nice_izakayas->count() }}
                    	            </span>
                    	        </li>
                    	    </a>
                    	</ul>
                    </div>
                    @endif
                </span>
                <form action="{{ action('Admin\CommentsController@izakayastore', $izakaya) }}" method="post" enctype="multipart/form-data">
                    <div class="comment">
                        <div class="commentform">
                            <input type="text" style="width:800px;" class="form-control" name="comment" placeholder="コメント">
                            @csrf
                            <input type="submit" class="btn btn-outline-dark" value="登録">
                        </div>
                        <br>
                        <div class="commenthistory">
                            @foreach($posts as $izakayacomment)
                            <div class="commentlist">
                                <div class="username">
                                    {{ $izakayacomment->user_name }}
                                    <div class="destroy">
                                        @if($izakayacomment->user_id === $rogin_id || $rogin_id === 1)
                                            <a class="destroy" href="{{ action('Admin\CommentsController@izakayadestroy', ['id' => $izakayacomment->id]) }}">削除</a>
                                        @else
                                            <p class="destroy">削除</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="comment_detail">
                                    {{ $izakayacomment->comment }}
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>                    
                    </div>
                </form>
             </div>
        </div>
    </div>
@endsection