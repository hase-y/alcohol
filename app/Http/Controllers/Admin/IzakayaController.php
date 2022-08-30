<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Izakaya;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image; 
use Storage;

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
        $img_path = Storage::disk('s3')->putFile('/', new File($local_img_path),'public');
        $izakaya->image_path = Storage::disk('s3')->url($img_path);
      } else {
        $izakaya->image_path = "/storage/image/Noimage.jpg";
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $izakaya->user_id = $id;
      $izakaya->fill($form);
      $izakaya->save();
      
      return redirect('admin/izakaya');
  }
  
   public function index(Request $request)
  {
    $rogin_id = Auth::id();
    $search = $request->search;
      if ($search != '') {
        $posts = Izakaya::where('use', 'like',  "%$search%")
                            ->orWhere('atmosphere', 'like',  "%$search%")
                            ->orWhere('zyanru', 'like',  "%$search%")
                            ->orWhere('store', 'like',  "%$search%")
                            ->orWhere('recommendation', 'like',  "%$search%")
                            ->orWhere('comment', 'like',  "%$search%")->paginate(12);
      } else {
        $posts = Izakaya::paginate(12);
      }
      return view('admin.izakaya.index', ['posts' => $posts, 'search' => $search, 'rogin_id' => $rogin_id ]);
  }
  
  public function alone(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Izakaya::where('use', '一人飲み')->paginate(12);

    return view('admin.izakaya.alone', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function others(Request $request)
  {
    $rogin_id = Auth::id();
    $posts = Izakaya::where('use', '一人飲みでない')->paginate(12);

    return view('admin.izakaya.others', ['posts' => $posts, 'rogin_id' => $rogin_id ]);
  }
  
  public function edit(Request $request)
  {
      $izakaya = Izakaya::find($request->id);
      if (empty($izakaya)) {
        abort(404);    
      }
      return view('admin.izakaya.edit', ['izakaya_form' => $izakaya]);
  }
  
    public function detail(Request $request)
  {
      $izakaya = Izakaya::find($request->id);
      if (empty($izakaya)) {
        abort(404);    
      }
      return view('admin.izakaya.detail', ['izakaya_form' => $izakaya]);
  }
  
  
  public function update(Request $request)
  {
      $this->validate($request, Izakaya::$rules);
      $izakaya = Izakaya::find($request->id);
      $izakaya_form = $request->all();
      
      if ($request->remove == 'true') {
          $izakaya_form['image_path'] = "/storage/image/Noimage.jpg";
      } elseif ($request->file('image')) {
          $img_file = $izakaya_form['image'];
          $extension = $img_file->extension();
          //ファイル名作成
          $img_name = uniqid(mt_rand()) . '.' . $extension;
          //画像を編集して、保存
          $local_img_path = config("filesystems.disks.local.tmp_dir"). '/'. $img_name;
          $img = Image::make($request->file('image'));
          $img->orientate();
          $img->resize(600, null,function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();}
            )->save($local_img_path);
          $img_path = Storage::disk('s3')->putFile('/', new File($local_img_path),'public');
          $izakaya_form['image_path'] = Storage::disk('s3')->url($img_path);
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
