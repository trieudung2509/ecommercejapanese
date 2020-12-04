<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate_post;
use App\Enum\CateEnum;
use App\Http\Requests\Cate_postRequest;
use Image;
use Illuminate\Support\Str;

class CatePostController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $cate_post = Cate_post::where('name','like', '%'.$request->search.'%')->paginate(10);
        } else {
            $cate_post = Cate_post::paginate(10);
        }
    	return view('admin.cate_post.index', compact('cate_post'));
    }
    public function create()
    {
        $category = Cate_post::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate_post.create', compact('category'));
    }
    public function postCreate(Cate_postRequest $request)
    {
        $cate_post                 = new Cate_post;
        $cate_post->name           = $request['name'];
        $cate_post->parent_id      = isset($request->parent_id) ? $request->parent_id : 0;
        $cate_post->slug           = Str::slug($cate_post->name);
        $cate_post->description    = isset($request['description']) ? $request['description'] : NULL;
        $cate_post->position       = isset($request['position']) ? $request['position'] : NULL;
        $cate_post->status         = (is_null($request['status']) ? '0' : '1');
        $cate_post->title_seo      = isset($request['title_seo']) ? $request['title_seo'] : NULL;
        $cate_post->meta_key      = isset($request['meta_key']) ? $request['meta_key'] : NULL;
        $cate_post->meta_des      = isset($request['meta_des']) ? $request['meta_des'] : NULL;
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/cate_post/'.$filename));
            $cate_post->image = 'upload/cate_post/'.$filename;
        }
        $cate_post->save();

    	return redirect()->route('admin.cate_post.list')->with('success','Add Category Post Success !');
    }
    public function update($id)
    {
        $category         = Cate_post::select('id','name','parent_id')->get()->toArray();
        $cate_post = Cate_post::findOrFail($id);

    	return view('admin.Cate_post.edit', compact('cate_post', 'category'));
    }
    public function postUpdate($id, Request $request)
    {
        $cate_post                 = cate_post::findOrFail($id);
        $cate_post->name           = $request['name'];
        $cate_post->parent_id      = isset($request->parent_id) ? $request->parent_id : 0;
        $cate_post->slug           = Str::slug($cate_post->name);
        $cate_post->description    = isset($request['description']) ? $request['description'] : NULL;
        $cate_post->position       = isset($request['position']) ? $request['position'] : NULL;
        $cate_post->status         = (is_null($request['status']) ? '0' : '1');
        $cate_post->title_seo      = isset($request['title_seo']) ? $request['title_seo'] : NULL;
        $cate_post->meta_key      = isset($request['meta_key']) ? $request['meta_key'] : NULL;
        $cate_post->meta_des      = isset($request['meta_des']) ? $request['meta_des'] : NULL;
    	if($request->hasFile('image'))
        {
            if(file_exists($cate_post->image))
            {
                unlink($cate_post->image);
            }
            $image    = $request->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/cate_post/'.$filename));
            $cate_post->image = 'upload/cate_post/'.$filename;

        }
    	$cate_post->save();

    	return redirect()->route('admin.cate_post.list')->with('success','Edit Category Post Success');
    }
    public function destroy($id)
    {
        $result  = Cate_post::findOrFail($id);
        $result2 = Cate_post::where('parent_id', $id)->first();
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        if(isset($result2))
        {
            if(file_exists($result2->image))
            {
                unlink($result2->image);
            }
            $result2->delete();
        }
        $result->delete();

        return response()->json([
            'status' => true,
        ]);
    }
    public function status(Request $request) {
        if (empty($request->select_box)) {
            return back()->with('error','Please choose category');
        } else {
            $arrValue = explode(",", $request->select_box);
            $type = $request->select_type;
            switch ($type) {
                case CateEnum::Active :
                    $check_value = Cate_post::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        Cate_post::whereIn('id',$arrValue)->update(['status' => CateEnum::Active]);
                    }
                break;
                case CateEnum::InActive :
                    $check_value = Cate_post::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        Cate_post::whereIn('id',$arrValue)->update(['status' => CateEnum::InActive ]);
                    }
                break;
                case CateEnum::Delete :
                    $check_value = Cate_post::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        Cate_post::whereIn('id',$arrValue)->delete();
                    }
                break;
            }
            return back()->with('success','Processed Successfully');
        }
    }

}
