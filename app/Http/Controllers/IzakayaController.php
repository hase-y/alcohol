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
}
