<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knob;
use App\Nice_knob;


class KnobController extends Controller
{
    public function index(Request $request)
  {
      $search = $request->search;
        if ($search != '') {
          $posts = Knob::where('zyanru', 'like',  "%$search%")
                            ->orWhere('product', 'like',  "%$search%")
                            ->orWhere('value', 'like',  "%$search%")
                            ->orWhere('comment', 'like',  "%$search%")
                            ->orWhere('matching_liquor', 'like',  "%$search%")->paginate(12);
      } else {
        $posts = Knob::paginate(12);
      }
      return view('knob.index', ['posts' => $posts, 'search' => $search ]);
  }
  
  public function shihan(Request $request)
  {
      $posts = Knob::where('zyanru', '市販品')->paginate(12);

      return view('knob.shihan', ['posts' => $posts ]);
  }
  
  public function tezukuri(Request $request)
  {
      $posts = Knob::where('zyanru', '手作り')->paginate(12);

      return view('knob.tezukuri', ['posts' => $posts ]);
  }
  
   public function detail(Knob $knob, Request $request)
  {
      $ip = $request->ip();
      $knob = Knob::find($request->id);
      $nice_knob=Nice_knob::where('knob_id', $knob->id)->where('ip', $ip)->exists();
      
      if (empty($knob)) {
        abort(404);    
      }
      return view('knob.detail', ['knob_form' => $knob, 'nice_knob' => $nice_knob], compact('knob', 'nice_knob'));
  }
}
