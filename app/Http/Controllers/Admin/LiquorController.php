<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Liquor;
use App\Nice;
use App\LiquorComment;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image; 
use Storage;

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
      //dd($form);
      $id = Auth::id();

      if (isset($form['image'])) {
        $img_file = $form['image'];
        $extension = $img_file->extension();
        //ファイル名作成
        $img_name = uniqid(mt_rand()) . '.' . $extension;
        //画像を編集して、保存
        $local_img_path = config("filesystems.disks.local.tmp_dir"). '/'. $img_name;
        $img = Image::make($request->file('image'));
        $img->orientate();
        $img->resize(600, null,function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        }
          )->save($local_img_path);
        // $img_path = 'storage/image/'.$img_name;
        $img_path = Storage::disk('s3')->putFile('/', new File($local_img_path),'public');
        $liquor->image_path = Storage::disk('s3')->url($img_path);
      } else {
        $liquor->image_path = "https://alcohollover.s3.ap-northeast-1.amazonaws.com/NDYeffScu8bjMhkm5z5kYmx9Zc3ddsouxP9GGW87.jpg";
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      // データベースに保存する
      $liquor->user_id = $id;
      $liquor->fill($form);
      $liquor->save();

      return redirect('admin/liquor');
  }
      
  public function index(Request $request)
  {
      $rogin_id = Auth::id();
      $search = $request->search;
      $value_search_low = $request->value_search_low;
      $value_search_high = $request->value_search_high;
      $request->validate([       
          'value_search_low' => 'integer|nullable',
          'value_search_high' => 'integer|nullable',
      ]);
      if($search != ''){
        if($value_search_low != '' && $value_search_high != ''){
          $posts = Liquor::where('value', '>=', $value_search_low)
                          ->where('value', '<=', $value_search_high)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('name', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            })->paginate(12);
        }elseif($value_search_low != '' && $value_search_high == ''){
          $posts = Liquor::where('value', '>=', $value_search_low)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('name', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            })->paginate(12);
        }elseif($value_search_low == '' && $value_search_high != ''){
          $posts = Liquor::where('value', '<=', $value_search_high)
                          ->where(function($q) use($search){
                            $q->where('zyanru', 'like',  "%$search%");
                            $q->orWhere('name', 'like',  "%$search%");
                            $q->orWhere('comment', 'like',  "%$search%");
                            })->paginate(12);
        }else{
          $posts = Liquor::where('zyanru', 'like',  "%$search%")
                          ->orWhere('name', 'like',  "%$search%")
                          ->orWhere('comment', 'like',  "%$search%")->paginate(12);
        }
      }else{
        if($value_search_low != '' && $value_search_high != ''){
          $posts = Liquor::where('value', '>=', $value_search_low)
                         ->where('value', '<=', $value_search_high)->paginate(12);
        }elseif($value_search_low != '' && $value_search_high == ''){
          $posts = Liquor::where('value', '>=', $value_search_low)->paginate(12);
        }elseif($value_search_low == '' && $value_search_high != ''){
          $posts = Liquor::where('value', '<=', $value_search_high)->paginate(12);
        }else{
          $posts = Liquor::paginate(12);
        }
      }
      return view('admin.liquor.index', ['posts' => $posts, 'search' => $search, 'value_search_low' => $value_search_low, 'value_search_high' => $value_search_high, 'rogin_id' => $rogin_id ]);
  }

  public function beer(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ビール')->paginate(12);
      
    return view('admin.liquor.beer', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function wine(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ワイン')->paginate(12);

    return view('admin.liquor.wine', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function whiskey(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ウイスキー')->paginate(12);

    return view('admin.liquor.whiskey', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function shochu(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', '焼酎')->paginate(12);

    return view('admin.liquor.shochu', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function sake(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', '日本酒')->paginate(12);

    return view('admin.liquor.sake', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function sour(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'サワー')->paginate(12);

    return view('admin.liquor.sour', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function highball(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'ハイボール')->paginate(12);

    return view('admin.liquor.highball', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function others(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Liquor::where('zyanru', 'その他')->paginate(12);

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
  
  public function detail(Liquor $liquor, Request $request)
  {   
      $ip = $request->ip();
      $liquor = Liquor::find($request->id);
      $nice=Nice::where('liquor_id', $liquor->id)->where('user_ip', $ip)->exists();
      
      if (empty($liquor)) {
        abort(404);    
      }
      
      $rogin_id = Auth::id();
      $posts = LiquorComment::where('liquor_id', $liquor->id)->get();
      //dd($liquor->id);
      return view('admin.liquor.detail', ['posts' => $posts, 'liquor_form' => $liquor, 'nice' => $nice, 'rogin_id' => $rogin_id], compact('liquor', 'nice'));
  }
  
  public function update(Request $request)
  {
      $this->validate($request, Liquor::$rules);
      $liquor = Liquor::find($request->id);
      $liquor_form = $request->all();
      
      if($request->remove == 'true'){
          $liquor_form['image_path'] = "https://alcohollover.s3.ap-northeast-1.amazonaws.com/NDYeffScu8bjMhkm5z5kYmx9Zc3ddsouxP9GGW87.jpg";
      }elseif ($request->file('image')){
          $img_file = $liquor_form['image'];
          $extension = $img_file->extension();
          //ファイル名作成
          $img_name = uniqid(mt_rand()) . '.' . $extension;
          //画像を編集して、保存
          $local_img_path = config("filesystems.disks.local.tmp_dir"). '/'. $img_name;
          $img = Image::make($request->file('image'));
          $img->orientate();
          $img->resize(600, null,function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          }
            )->save($local_img_path);
          $img_path = Storage::disk('s3')->putFile('/', new File($local_img_path),'public');
          $liquor_form['image_path'] = Storage::disk('s3')->url($img_path);
      }else{
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
      return redirect('admin/liquor');
  }  
}
