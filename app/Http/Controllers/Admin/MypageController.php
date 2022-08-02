<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{
  
  public function index(Request $request)
  {
      return view('admin.mypage.mypage');
  }
  
  
}
