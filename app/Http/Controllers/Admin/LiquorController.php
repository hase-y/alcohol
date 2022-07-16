<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Liquor;

class LiquorController extends Controller
{
     public function add()
  {
      return view('admin.liquor.create');
  }
  
  public function create(Request $request)
  {
      $this->validate($request, Liquor::$rules);

      $liquor = new Liquor;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $liquor->image_path = basename($path);
      } else {
          $liquor->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $liquor->fill($form);
      $liquor->save();

      return redirect('admin/liquor/create');
  }
  
  public function index(Request $request)
  {
      $posts = Liquor::all();
      return view('admin.liquor.index', ['posts' => $posts ]);
  }
  
  public function beer(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ビール')->get();


      return view('admin.liquor.beer', ['posts' => $posts ]);
  }
  
  public function wine(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ワイン')->get();

      return view('admin.liquor.wine', ['posts' => $posts ]);
  }
  
  public function whiskey(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ウイスキー')->get();

      return view('admin.liquor.whiskey', ['posts' => $posts ]);
  }
  
  public function shochu(Request $request)
  {
      $posts = Liquor::where('zyanru', '焼酎')->get();

      return view('admin.liquor.shochu', ['posts' => $posts ]);
  }
  
  public function sake(Request $request)
  {
      $posts = Liquor::where('zyanru', '日本酒')->get();

      return view('admin.liquor.sake', ['posts' => $posts ]);
  }
  
  public function sour(Request $request)
  {
      $posts = Liquor::where('zyanru', 'サワー')->get();

      return view('admin.liquor.sour', ['posts' => $posts ]);
  }
  
  public function highball(Request $request)
  {
      $posts = Liquor::where('zyanru', 'ハイボール')->get();

      return view('admin.liquor.highball', ['posts' => $posts ]);
  }
  
  public function others(Request $request)
  {
      $posts = Liquor::where('zyanru', 'その他')->get();

      return view('admin.liquor.others', ['posts' => $posts ]);
  }
  
  
  public function edit(Request $request)
  {
      $liquor = Liquor::find($request->id);
      if (empty($liquor)) {
        abort(404);    
      }
      return view('admin.liquor.edit', ['liquor_form' => $liquor]);
  }
  
    public function detail(Request $request)
  {
      $liquor = Liquor::find($request->id);
      if (empty($liquor)) {
        abort(404);    
      }
      return view('admin.liquor.detail', ['liquor_form' => $liquor]);
  }
  
  
  public function update(Request $request)
  {
      $this->validate($request, Liquor::$rules);
      $liquor = Liquor::find($request->id);
      $liquor_form = $request->all();
      
      if ($request->remove == 'true') {
          $liquor_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $liquor_form['image_path'] = basename($path);
      } else {
          $liquor_form['image_path'] = $liquor->image_path;
      }

      unset($liquor_form['image']);
      unset($liquor_form['remove']);
      unset($liquor_form['_token']);

      // 該当するデータを上書きして保存する
      $liquor->fill($liquor_form)->save();

      return redirect('admin/liquor');
  }
  
  public function delete(Request $request)
  {
      $liquor = Liquor::find($request->id);
      $liquor->delete();
      return redirect('admin/liquor/');
  }  
}
