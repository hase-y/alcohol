<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Liquor;

class LiquorController extends Controller
{
    public function index(Request $request)
  {
      $posts = Liquor::all();
      return view('liquor.index', ['posts' => $posts ]);
  }
  
  public function beer(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ビール')->get();


      return view('liquor.beer', ['posts' => $posts ]);
  }
  
    public function wine(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ワイン')->get();

      return view('liquor.wine', ['posts' => $posts ]);
  }
  
  public function whiskey(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ウイスキー')->get();

      return view('liquor.whiskey', ['posts' => $posts ]);
  }
  
  public function shochu(Request $request)
  {
      $posts = Liquor::where('zyanru', '焼酎')->get();

      return view('liquor.shochu', ['posts' => $posts ]);
  }
  
  public function sake(Request $request)
  {
      $posts = Liquor::where('zyanru', '日本酒')->get();

      return view('liquor.sake', ['posts' => $posts ]);
  }
  
  public function sour(Request $request)
  {
      $posts = Liquor::where('zyanru', 'サワー')->get();

      return view('liquor.sour', ['posts' => $posts ]);
  }
  
  public function highball(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ハイボール')->get();

      return view('liquor.highball', ['posts' => $posts ]);
  }
  
  public function others(Request $request)
  {
      $posts = Liquor::where('zyanru', 'その他')->get();

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
