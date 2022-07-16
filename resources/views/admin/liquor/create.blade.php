{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'おすすめ酒')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おすすめ酒登録</h2>
                <form action="{{ action('Admin\LiquorController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル選択</label>
                        <div class="col-md-10">
                            <select name="zyanru">
                                <option value="ビール">ビール</option>
                                <option value="ワイン">ワイン</option>
                                <option value="ウイスキー">ウイスキー</option>
                                <option value="焼酎">焼酎</option>
                                <option value="日本酒">日本酒</option>
                                <option value="サワー">サワー</option>
                                <option value="ハイボール">ハイボール</option>
                                <option value="その他">その他</option>
                            </select>
                            {{--<input type="text" class="form-control" name="title" value="{{ old('title') }}">--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">お酒の名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <!--<textbox class="form-control" name="name">{{ old('name') }}</textbox>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                            <!--<textbox class="form-control" name="comment">{{ old('comment') }}</textarea>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="value" value="{{ old('value') }}">
                            <!--<textarea class="form-control" name="value">{{ old('value') }}</textarea>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection