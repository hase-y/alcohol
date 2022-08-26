{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.front')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'お店の詳細')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>お店の詳細</h2>
                <form action="{{ action('IzakayaController@detail') }}" method="post" enctype="multipart/form-data">

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
                                <img src="{{asset('storage/image/'.$izakaya_form->image_path)}}">
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
                </form>
             </div>
        </div>
    </div>
@endsection