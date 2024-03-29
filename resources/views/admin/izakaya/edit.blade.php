{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'お店の編集')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おすすめのお店の編集</h2>
                <form action="{{ action('Admin\IzakayaController@edit') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    <div class="form-group row">
                        <label class="col-md-3">用途</label>
                        <div class="col-md-9">
                            <select name="use">
                                <option value="一人飲み">一人飲み</option>
                                <option value="一人飲みでない">一人飲みでない</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">雰囲気</label>
                        <div class="col-md-9">
                            <select name="atmosphere">
                                <option value="落ち着いてる">落ち着いてる</option>
                                <option value="にぎやか">にぎやか</option>
                                <option value="アットホーム">アットホーム</option>
                                <option value="常連が多い">常連が多い</option>
                                <option value="おしゃれ">おしゃれ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-3">ジャンル</label>
                        <div class="col-md-9">
                            <select name="zyanru">
                                <option value="居酒屋">居酒屋</option>
                                <option value="レストラン">レストラン</option>
                                <option value="バル">バル</option>
                                <option value="小料理屋">小料理屋</option>
                                <option value="焼肉">焼肉</option>
                                <option value="バー">バー</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">店名</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="store" value="{{ $izakaya_form->store }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">おすすめの一品</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="recommendation" value="{{ $izakaya_form->recommendation }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">コメント</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="comment" value="{{ $izakaya_form->comment }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">写真（料理でもお店でも）</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $izakaya_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $izakaya_form->id }}">
                    @csrf
                    <input type="submit" class="btn btn-outline-dark" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection