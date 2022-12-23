<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Liquor;
use App\Izakaya;
use App\Knob;
use App\LiquorComment;
use App\IzakayaComment;
use App\KnobComment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function liquorstore(Liquor $liquor, Request $request)
    {
        $this->validate($request, LiquorComment::$rules);
        
        if(empty($request->comment)){
            return back();
        }else{
            $liquorcomment = New LiquorComment();
            $liquorcomment->liquor_id = $liquor->id;
            //dd($liquor);
            $liquorcomment->user_id = Auth::user()->id;
            $liquorcomment->user_name = Auth::user()->name;
            $liquorcomment->comment = $request->comment;
            $liquorcomment->save();
            return back();
        }
    }
    
    public function liquordestroy(Request $request)
    {
        $liquorcommenmt = LiquorComment::find($request->id);
        $liquorcommenmt->delete();
        return back();
    }
    
    public function izakayastore(Izakaya $izakaya, Request $request)
    {
        $this->validate($request, IzakayaComment::$rules);
        
        if(empty($request->comment)){
            return back();
        }else{
            $izakayacomment = New IzakayaComment();
            $izakayacomment->izakaya_id = $izakaya->id;
            //dd($liquor);
            $izakayacomment->user_id = Auth::user()->id;
            $izakayacomment->user_name = Auth::user()->name;
            $izakayacomment->comment = $request->comment;
            $izakayacomment->save();
            return back();
        }
    }
    
    public function izakayadestroy(Request $request)
    {
        $izakayacommenmt = IzakayaComment::find($request->id);
        $izakayacommenmt->delete();
        return back();
    }
    
    public function knobstore(Knob $knob, Request $request)
    {
        $this->validate($request, KnobComment::$rules);
        
        if(empty($request->comment)){
            return back();
        }else{
            $knobcomment = New KnobComment();
            $knobcomment->knob_id = $knob->id;
            //dd($liquor);
            $knobcomment->user_id = Auth::user()->id;
            $knobcomment->user_name = Auth::user()->name;
            $knobcomment->comment = $request->comment;
            $knobcomment->save();
            return back();
        }
    }
    
    public function knobdestroy(Request $request)
    {
        $knobcommenmt = KnobComment::find($request->id);
        $knobcommenmt->delete();
        return back();
    }
}
