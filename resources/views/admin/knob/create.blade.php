{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'おすすめ酒登録'を埋め込む --}}
@section('title', 'おつまみ')

{{-- @section @yeildに情報を表示する --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>おつまみの登録</h2>
                <form action="{{ action('Admin\KnobController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    <div class="form-group row">
                    <label class="col-md-3">市販品 or 手作り選択してください</label>
                        <div class="col-md-9">	
                        	<select id="kind" name="zyanru">
                        		<option value="市販品">市販品</option>
                        		<option value="手作り">手作り</option>
                        	</select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                       <label class="col-md-3">商品名 or 料理名</label>
                       <div class="col-md-9">
                           <input type="text" class="form-control" name="product" value="{{ old('product') }}">
                       </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">価格</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="value" value="{{ old('value') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">コメント</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">これに合うお酒</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="matching_liquor" value="{{ old('matching_liquor') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">写真</label>
                        <div class="col-md-9">
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