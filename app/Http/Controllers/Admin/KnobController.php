<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Knob;

class KnobController extends Controller
{
  public function add()
  {
      return view('admin.knob.create');
  }
  
  public function create(Request $request)
  {
    //dd(Knob::$rules, $request->all());
      $this->validate($request, Knob::$rules);

      $knob = new Knob;
      $form = $request->all();
      
      var_dump($form);
   
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $knob->image_path = basename($path);
      } else {
          $knob->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // $knob = new Knob;
      // if($request->zyanru == "市販品"){
      //   $knob->comment_shihanhin = $request->comment;
      // }elseif($request->zyanru == "手作り"){
      //   $knob->comment_tedukuri = $request->comment;
      // }
      
      $knob->save();
      $knob->fill($form);

      return redirect('admin/knob/create');
  }  
  
  public function index(Request $request)
  {
      $posts = Knob::all();
      return view('admin.knob.index', ['posts' => $posts ]);
  }
}
