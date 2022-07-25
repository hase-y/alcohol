<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Izakaya;

class IzakayaController extends Controller
{
     public function index(Request $request)
  {
      $posts = Izakaya::all();
      return view('izakaya.index', ['posts' => $posts ]);
  }
  
  public function alone(Request $request)
  {
      $posts = Izakaya::where('use', '一人飲み')->get();

      return view('izakaya.alone', ['posts' => $posts ]);
  }
  
  public function others(Request $request)
  {
      $posts = Izakaya::where('use', '一人飲みでない')->get();

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
