<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knob;

class KnobController extends Controller
{
    public function index(Request $request)
  {
      $posts = Knob::all();
      return view('knob.index', ['posts' => $posts ]);
  }
  
  public function shihan(Request $request)
  {
      $posts = Knob::where('zyanru', '市販品')->get();

      return view('knob.shihan', ['posts' => $posts ]);
  }
  
  public function tezukuri(Request $request)
  {
      $posts = Knob::where('zyanru', '手作り')->get();

      return view('knob.tezukuri', ['posts' => $posts ]);
  }
  
  public function detail(Request $request)
  {
      $knob = Knob::find($request->id);
      if (empty($knob)) {
        abort(404);    
      }
      return view('admin.knob.detail', ['knob_form' => $knob]);
  }
}
