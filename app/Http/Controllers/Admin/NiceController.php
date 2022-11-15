<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Liquor;
use App\Izakaya;
use App\Knob;
use App\Nice;
use App\Nice_izakaya;
use App\Nice_knob;
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
    
    public function nice_izakaya(Izakaya $izakaya, Request $request){
        $nice_izakaya=New Nice_izakaya();
        $nice_izakaya->izakaya_id=$izakaya->id;
        $nice_izakaya->user_id=Auth::user()->id;
        $nice_izakaya->save();
        return back();
    }
    
    public function unnice_izakaya(Izakaya $izakaya, Request $request){
        $user=Auth::user()->id;
        $nice_izakaya=Nice_izakaya::where('izakaya_id', $izakaya->id)->where('user_id', $user)->first();
        $nice_izakaya->delete();
        return back();
    }
    
    public function nice_knob(Knob $knob, Request $request){
        $nice_knob=New Nice_knob();
        $nice_knob->knob_id=$knob->id;
        $nice_knob->user_id=Auth::user()->id;
        $nice_knob->save();
        return back();
    }
    
    public function unnice_knob(Knob $knob, Request $request){
        $user=Auth::user()->id;
        $nice_knob=Nice_knob::where('knob_id', $knob->id)->where('user_id', $user)->first();
        $nice_knob->delete();
        return back();
    }
    
    
}
