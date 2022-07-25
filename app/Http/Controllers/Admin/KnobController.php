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
      $this->validate($request, Knob::$rules);

      $knob = new Knob;
      $form = $request->all();
      
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
      
      $knob->fill($form);
      $knob->save();

      return redirect('admin/knob/create');
  }
    
  public function index(Request $request)
  {
      $posts = Knob::all();
      return view('admin.knob.index', ['posts' => $posts ]);
  }
  
   public function shinan(Request $request)
  {
      $posts = Knob::where('zyanru', '市販品')->get();

      return view('admin.knob.shihan', ['posts' => $posts ]);
  }
  
   public function tezukuri(Request $request)
  {
      $posts = Knob::where('zyanru', '手作り')->get();

      return view('admin.knob.tezukuri', ['posts' => $posts ]);
  }
  
   public function edit(Request $request)
  {
      $knob = Knob::find($request->id);
      if (empty($knob)) {
        abort(404);    
      }
      return view('admin.knob.edit', ['knob_form' => $knob]);
  }
  
    public function detail(Request $request)
  {
      $knob = Knob::find($request->id);
      if (empty($knob)) {
        abort(404);    
      }
      return view('admin.knob.detail', ['knob_form' => $knob]);
  }
  
  
  public function update(Request $request)
  {
      $this->validate($request, Knob::$rules);
      $knob = Knob::find($request->id);
      $knob_form = $request->all();
      
      if ($request->remove == 'true') {
          $knob_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $knob_form['image_path'] = basename($path);
      } else {
          $knob_form['image_path'] = $knob->image_path;
      }

      unset($knob_form['image']);
      unset($knob_form['remove']);
      unset($knob_form['_token']);

      // 該当するデータを上書きして保存する
      $knob->fill($knob_form)->save();

      return redirect('admin/knob');
  }
  
  public function delete(Request $request)
  {
      $knob = Knob::find($request->id);
      $knob->delete();
      return redirect('admin/knob/');
  }  
}
