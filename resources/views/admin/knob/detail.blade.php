{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'おつまみの詳細')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おつまみの詳細</h2>
                <form action="{{ action('Admin\KnobController@detail') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    <div class="oya">
                        <div class="knob_image">
                                <!--<input type="file" class="form-control-file" name="image">-->
                                <div class="form-text text-info">
                                    <img src="{{ $knob_form->image_path }}">
                                </div>
                        </div>
                        <div class="knob_explanation">
                            <label class="col-md-20">商品名 or 料理名</label>
                            <div class="col-md-30">
                                <a>　{{ $knob_form->product }}</a>
                            </div>
                            <br>
                            <label class="col-md-20">価格</label>
                            <div class="col-md-30">
                                <a>　{{ $knob_form->value }}　円</a>
                            </div>
                            <br>
                            <label class="col-md-20">コメント</label>
                            <div class="col-md-30">
                                <a>　{{ $knob_form->comment }}</a>
                            </div>
                            <br>
                            <label class="col-md-20">ジャンル</label>
                            <div class="col-md-30">
                                <a>　{{ $knob_form->zyanru }}</a>
                            </div>
                            <br>
                            <label class="col-md-20">これに合うお酒</label>
                            <div class="col-md-30">
                                <a>　{{ $knob_form->matching_liquor }}</a>
                            </div>
                        </div>
                    </div>
                    <span>
                        <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                        @if($nice_knob)
                        <!-- 「いいね」取消用ボタンを表示 -->
                        <a href="{{ route('unnice_knob', $knob) }}" class="btn btn-success btn-sm">
                        	いいね
                        	<!-- 「いいね」の数を表示 -->
                        	<span class="badge">
                        		{{ $knob->nice_knobs->count() }}
                        	</span>
                        </a>
                        @else
                        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        <a href="{{ route('nice_knob', $knob) }}" class="btn btn-secondary btn-sm">
                        	いいね
                        	 <!--「いいね」の数を表示 -->
                        	<span class="badge">
                        	    {{ $knob->nice_knobs->count() }}
                        	</span>
                        </a>
                        @endif
                    </span>
                </form>
             </div>
        </div>
    </div>
@endsection