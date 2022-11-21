<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liquor;
use App\Nice;

class LiquorController extends Controller
{
    public function index(Request $request)
  {
      $search = $request->search;
      $value_search_low = $request->value_search_low;
      $value_search_high = $request->value_search_high;
      if($search != ''){
        if($value_search_low != '' && $value_search_high != ''){
          $posts = Liquor::where('value', '>=', $value_search_low)
                          ->where('value', '<=', $value_search_high)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('name', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            })->paginate(12);
        }elseif($value_search_low != '' && $value_search_high == ''){
          $posts = Liquor::where('value', '>=', $value_search_low)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('name', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            })->paginate(12);
        }elseif($value_search_low == '' && $value_search_high != ''){
          $posts = Liquor::where('value', '<=', $value_search_high)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('name', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            })->paginate(12);
        }else{
          $posts = Liquor::where('zyanru', 'like',  "%$search%")
                          ->orWhere('name', 'like',  "%$search%")
                          ->orWhere('comment', 'like',  "%$search%")->paginate(12);
        }
      }else{
        if($value_search_low != '' && $value_search_high != ''){
          $posts = Liquor::where('value', '>=', $value_search_low)
                         ->where('value', '<=', $value_search_high)->paginate(12);
        }elseif($value_search_low != '' && $value_search_high == ''){
          $posts = Liquor::where('value', '>=', $value_search_low)->paginate(12);
        }elseif($value_search_low == '' && $value_search_high != ''){
          $posts = Liquor::where('value', '<=', $value_search_high)->paginate(12);
        }else{
          $posts = Liquor::paginate(12);
        }
      }
      return view('liquor.index', ['posts' => $posts, 'search' => $search, 'value_search_low' => $value_search_low, 'value_search_high' => $value_search_high ]);
  }
  
  public function beer(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ビール')->paginate(12);

      return view('liquor.beer', ['posts' => $posts ]);
  }
  
    public function wine(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ワイン')->paginate(12);

      return view('liquor.wine', ['posts' => $posts ]);
  }
  
  public function whiskey(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ウイスキー')->paginate(12);

      return view('liquor.whiskey', ['posts' => $posts ]);
  }
  
  public function shochu(Request $request)
  {
      $posts = Liquor::where('zyanru', '焼酎')->paginate(12);

      return view('liquor.shochu', ['posts' => $posts ]);
  }
  
  public function sake(Request $request)
  {
      $posts = Liquor::where('zyanru', '日本酒')->paginate(12);

      return view('liquor.sake', ['posts' => $posts ]);
  }
  
  public function sour(Request $request)
  {
      $posts = Liquor::where('zyanru', 'サワー')->paginate(12);

      return view('liquor.sour', ['posts' => $posts ]);
  }
  
  public function highball(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ハイボール')->paginate(12);

      return view('liquor.highball', ['posts' => $posts ]);
  }
  
  public function others(Request $request)
  {
      $posts = Liquor::where('zyanru', 'その他')->paginate(12);

      return view('liquor.others', ['posts' => $posts ]);
  }
  
  public function detail(Liquor $liquor, Request $request)
  {   
      $ip = $request->ip();
      $liquor = Liquor::find($request->id);
      $nice=Nice::where('liquor_id', $liquor->id)->where('user_ip', $ip)->exists();
      
      if (empty($liquor)) {
        abort(404);    
      }

      return view('liquor.detail', ['liquor_form' => $liquor, 'nice' => $nice], compact('liquor', 'nice'));
  }
  
}
