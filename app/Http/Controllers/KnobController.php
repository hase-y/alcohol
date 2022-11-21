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
    $value_search_low = $request->value_search_low;
    $value_search_high = $request->value_search_high;
        if ($search != '') {
          if($value_search_low != '' && $value_search_high != ''){
            $posts = Knob::where('value', '>=', $value_search_low)
                          ->where('value', '<=', $value_search_high)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('product', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            $q->orWhere('matching_liquor', 'like',  "%$search%");
                            })->paginate(12);
          }elseif($value_search_low != '' && $value_search_high == ''){
            $posts = Knob::where('value', '>=', $value_search_low)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('product', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            $q->orWhere('matching_liquor', 'like',  "%$search%");
                            })->paginate(12);
          }elseif($value_search_low == '' && $value_search_high != ''){
            $posts = Knob::where('value', '<=', $value_search_high)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('product', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            $q->orWhere('matching_liquor', 'like',  "%$search%");
                            })->paginate(12);
          }else{
            $posts = Knob::where('zyanru', 'like',  "%$search%")
                          ->orWhere('product', 'like',  "%$search%")
                          ->orWhere('comment', 'like',  "%$search%")
                          ->orWhere('matching_liquor', 'like',  "%$search%")->paginate(12);
          }
      }else{
        if($value_search_low != '' && $value_search_high != ''){
          $posts = Knob::where('value', '>=', $value_search_low)
                         ->where('value', '<=', $value_search_high)->paginate(12);
        }elseif($value_search_low != '' && $value_search_high == ''){
          $posts = Knob::where('value', '>=', $value_search_low)->paginate(12);
        }elseif($value_search_low == '' && $value_search_high != ''){
          $posts = Knob::where('value', '<=', $value_search_high)->paginate(12);
        }else{
          $posts = Knob::paginate(12);
        }
      }
      return view('knob.index', ['posts' => $posts, 'search' => $search, 'value_search_low' => $value_search_low, 'value_search_high' => $value_search_high ]);
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
      $nice_knob=Nice_knob::where('knob_id', $knob->id)->where('user_ip', $ip)->exists();
      
      if (empty($knob)) {
        abort(404);    
      }
      return view('knob.detail', ['knob_form' => $knob, 'nice_knob' => $nice_knob], compact('knob', 'nice_knob'));
  }
}
