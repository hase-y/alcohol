<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Knob;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image; 
use Storage;

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
      $id = Auth::id();
      
      if (isset($form['image'])) {
        $img_file = $form['image'];
        $extension = $img_file->extension();
        //ファイル名作成
        $img_name = uniqid(mt_rand()) . '.' . $extension;
        //画像を編集して、保存
        $local_img_path = storage_path(). '/app/public/image/'. $img_name;
        $img = Image::make($request->file('image'));
        $img->orientate();
        $img->resize(600, null,function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        }
          )->save($local_img_path);
        $img_path = Storage::disk('s3')->putFile('/', new File($local_img_path),'public');
        $knob->image_path = Storage::disk('s3')->url($img_path);
      } else {
        $knob->image_path = "/storage/image/Noimage.jpg";
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      $knob->user_id = $id;
      $knob->fill($form);
      $knob->save();

      return redirect('admin/knob');
  }
    
  public function index(Request $request)
  {
    $rogin_id = Auth::id();
    $search = $request->search;
        if ($search != '') {
          $posts = Knob::where('zyanru', 'like',  "%$search%")
                            ->orWhere('product', 'like',  "%$search%")
                            ->orWhere('value', 'like',  "%$search%")
                            ->orWhere('comment', 'like',  "%$search%")
                            ->orWhere('matching_liquor', 'like',  "%$search%")->paginate(12);
      } else {
        $posts = Knob::paginate(12);
      }
      return view('admin.knob.index', ['posts' => $posts, 'search' => $search, 'rogin_id' => $rogin_id ]);
  }
  
   public function shihan(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Knob::where('zyanru', '市販品')->paginate(12);

    return view('admin.knob.shihan', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
   public function tezukuri(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Knob::where('zyanru', '手作り')->paginate(12);

    return view('admin.knob.tezukuri', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
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
      
      if($request->remove == 'true'){
          $knob_form['image_path'] = "/storage/image/Noimage.jpg";
      }elseif($request->file('image')){
          $img_file = $knob_form['image'];
          $extension = $img_file->extension();
          //ファイル名作成
          $img_name = uniqid(mt_rand()) . '.' . $extension;
          //画像を編集して、保存
          $local_img_path = storage_path(). '/app/public/image/'. $img_name;
          $img = Image::make($request->file('image'));
          $img->orientate();
          $img->resize(600, null,function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
          }
            )->save($local_img_path);
          $img_path = Storage::disk('s3')->putFile('/', new File($local_img_path),'public');
          $knob_form['image_path'] = Storage::disk('s3')->url($img_path);
      }else{
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
