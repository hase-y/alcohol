<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Izakaya;

class IzakayaController extends Controller
{
     public function index(Request $request)
  {
      $search = $request->search;
      if ($search != '') {
        $posts = Izakaya::where('use', 'like',  "%$search%")
                            ->orWhere('atmosphere', 'like',  "%$search%")
                            ->orWhere('zyanru', 'like',  "%$search%")
                            ->orWhere('store', 'like',  "%$search%")
                            ->orWhere('recommendation', 'like',  "%$search%")
                            ->orWhere('comment', 'like',  "%$search%")->paginate(12);
      } else {
        $posts = Izakaya::paginate(12);
      }
      return view('izakaya.index', ['posts' => $posts, 'search' => $search ]);
  }
  
  public function alone(Request $request)
  {
      $posts = Izakaya::where('use', '一人飲み')->paginate(12);

      return view('izakaya.alone', ['posts' => $posts ]);
  }
  
  public function others(Request $request)
  {
      $posts = Izakaya::where('use', '一人飲みでない')->paginate(12);

      return view('izakaya.others', ['posts' => $posts ]);
  }
  
      public function detail(Request $request)
  {
      $izakaya = Izakaya::find($request->id);
      if (empty($izakaya)) {
        abort(404);    
      }
      return view('izakaya.detail', ['izakaya_form' => $izakaya]);
  }
  
}
