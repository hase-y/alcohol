<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knob;

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
  
  public function detail(Request $request)
  {
      $knob = Knob::find($request->id);
      if (empty($knob)) {
        abort(404);    
      }
      return view('knob.detail', ['knob_form' => $knob]);
  }
}
