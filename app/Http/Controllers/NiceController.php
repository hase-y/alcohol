<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liquor;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice(Liquor $liquor, Request $request){
        $nice=New Nice();
        $nice->liquor_id=$Liquor->id;
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
