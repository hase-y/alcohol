<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Liquor;
use Illuminate\Support\Facades\Auth;

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
      $id = Auth::id();
      var_dump($id);
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
      $liquor->user_id = $id;
      $liquor->fill($form);
      $liquor->save();

      return redirect('admin/liquor/create');
  }
      
  public function index(Request $request)
  {
    $rogin_id = Auth::id();
      $search = $request->search;
        if ($search != '') {
          $posts = Liquor::where('zyanru', 'like',  "%$search%")
                            ->orWhere('name', 'like',  "%$search%")
                            ->orWhere('value', 'like',  "%$search%")
                            ->orWhere('comment', 'like',  "%$search%")->get();
      } else {
          $posts = Liquor::all();
      }
      return view('admin.liquor.index', ['posts' => $posts, 'search' => $search, 'rogin_id' => $rogin_id ]);
  }

  public function beer(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ビール')->get();
      
    return view('admin.liquor.beer', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function wine(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ワイン')->get();

    return view('admin.liquor.wine', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function whiskey(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ウイスキー')->get();

    return view('admin.liquor.whiskey', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function shochu(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', '焼酎')->get();

    return view('admin.liquor.shochu', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function sake(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', '日本酒')->get();

    return view('admin.liquor.sake', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function sour(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'サワー')->get();

    return view('admin.liquor.sour', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function highball(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ハイボール')->get();

    return view('admin.liquor.highball', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function others(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'その他')->get();

    return view('admin.liquor.others', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
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
    $rogin_id = Auth::id();
    $register_id = Liquor::find($request->user_id);
    if($rogin_id != $register_id){
       abort(404);
    }else{
      $liquor = Liquor::find($request->id);
      $liquor->delete();
      return redirect('admin/liquor/');
    }
  }  
}
