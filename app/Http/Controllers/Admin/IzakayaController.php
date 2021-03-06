<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Izakaya;

class IzakayaController extends Controller
{
    public function add()
  {
      return view('admin.izakaya.create');
  }
  
   public function create(Request $request)
  {
      $this->validate($request, Izakaya::$rules);

      $izakaya = new Izakaya;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $izakaya->image_path = basename($path);
      } else {
          $izakaya->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $izakaya->fill($form);
      $izakaya->save();
      
      return redirect('admin/izakaya/create');
  }
  
   public function index(Request $request)
  {
      $posts = Izakaya::all();
      return view('admin.izakaya.index', ['posts' => $posts ]);
  }
  
  public function alone(Request $request)
  {
      $posts = Izakaya::where('use', '一人のみ向き')->get();

      return view('admin.izakaya.alone', ['posts' => $posts ]);
  }
  
  public function others(Request $request)
  {
      $posts = Izakaya::where('use', 'それ以外')->get();

      return view('admin.izakaya.others', ['posts' => $posts ]);
  }
  
  public function edit(Request $request)
  {
      $liquor = Izakaya::find($request->id);
      if (empty($izakaya)) {
        abort(404);    
      }
      return view('admin.izakaya.edit', ['izakaya_form' => $izakaya]);
  }
  
  public function update(Request $request)
  {
      $this->validate($request, Izakaya::$rules);
      $izakaya = Izakaya::find($izakaya->id);
      $izakaya_form = $request->all();
      
      if ($request->remove == 'true') {
          $izakaya_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $izakaya_form['image_path'] = basename($path);
      } else {
          $izakaya_form['image_path'] = $izakaya->image_path;
      }

      unset($izakaya_form['image']);
      unset($izakaya_form['remove']);
      unset($izakaya_form['_token']);

      // 該当するデータを上書きして保存する
      $izakaya->fill($izakaya_form)->save();

      return redirect('admin/izakaya');
  }
  
  public function delete(Request $request)
  {
      $izakaya = Izakaya::find($request->id);
      $izakaya->delete();
      return redirect('admin/izakaya/');
  }  
}
