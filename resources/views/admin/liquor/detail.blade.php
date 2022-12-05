{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.front')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'お酒の詳細')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おすすめ酒の詳細</h2>
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    <div class="oya">
                        <div class="liquor_image">
                                <div class="form-text text-info">
                                    <img src="{{ $liquor_form->image_path }}">
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
                        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        <div class="good">
                            <ul>
                                <a href="{{ route('nice', $liquor) }}">
                                    <li><img src="https://alcohollover.s3.ap-northeast-1.amazonaws.com/IchuOb76Clji4UPixUilhgHfrgt3yKRBaONI65cO.jpg"></li>
                                	<!--「いいね」の数を表示 -->
                                	<li>いいね
                                	    <span class="badge">
                                	    {{ $liquor->nices->count() }}
                                	    </span>
                                	</li>
                                </a>
                            </ul>
                        </div>
                        @endif
                    </span>
                </form>
             </div>
        </div>
    </div>
@endsection