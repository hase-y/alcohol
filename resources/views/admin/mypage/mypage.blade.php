@extends('layouts.admin')
@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h2>マイページ</h2>
        <br>
        <div class="list_register">
            <div class = "register_liquor">
                <label class="col-md-3">お酒</label>
            </div>
            <div class = "register_store">
                <label class="col-md-3">お店</label>
            </div>
            <div class = "register_knob">
                <label class="col-md-3">おつまみ</label>
            </div>
        </div>
        
    </div>
@endsection