<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liquor;

class LiquorController extends Controller
{
    public function index(Request $request)
  {
      $search = $request->search;
      if ($search != '') {
        $posts = Liquor::where('zyanru', 'like',  "%$search%")
                          ->orWhere('name', 'like',  "%$search%")
                          ->orWhere('value', 'like',  "%$search%")
                          ->orWhere('comment', 'like',  "%$search%")->paginate(12);
      } else {
        $posts = Liquor::paginate(12);
      }
      return view('liquor.index', ['posts' => $posts, 'search' => $search ]);
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
  
    public function detail(Request $request)
  {
      $liquor = Liquor::find($request->id);
      if (empty($liquor)) {
        abort(404);    
      }
      return view('liquor.detail', ['liquor_form' => $liquor]);
  }
  
}
