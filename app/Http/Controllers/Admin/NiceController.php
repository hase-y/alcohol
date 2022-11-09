<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Liquor;
use App\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice(Liquor $liquor, Request $request){
        $nice=New Nice();
        $nice->liquor_id=$liquor->id;
        $nice->user_id=Auth::user()->id;
        $nice->save();
        return back();
    }
    

    
    public function unnice(Liquor $liquor, Request $request){
        $user=Auth::user()->id;
        $nice=Nice::where('liquor_id', $liquor->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
