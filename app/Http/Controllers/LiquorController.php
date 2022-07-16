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
}
