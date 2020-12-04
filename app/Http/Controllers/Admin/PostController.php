<?php

namespace App\Http\Controllers\Admin;

use App\Enum\CateEnum;
use App\Http\Controllers\Controller;
use App\Models\Cate_post;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request) {
        if (isset($request->search)) {
            $post = Post::where('name','like', '%'.$request->search.'%')->paginate(10);
        } else {
            $post = Post::paginate(10);
        }
    	return view('admin.post.index', compact('post'));
    }
    public function create() {
        $cate_post = Cate_post::select('id','name','parent_id')->get()->toArray();
    	return view('admin.post.create', compact('cate_post'));
    }
    public function postCreate(Request $request) {
        $post                 = new Post();
        $post->name           = $request['name'];
        $post->slug           = Str::slug($post->name);
        $post->cate_post_id   = isset($request->cate_post_id) ? $request->cate_post_id : 0;
        $post->position       = isset($request['position']) ? $request['position'] : NULL;
        $post->user_id        = Auth::user()->id;
        $post->status         = (is_null($request['status']) ? '0' : '1');
        $post->is_home        = (is_null($request['is_home']) ? '0' : '1');
        $post->description    = isset($request['description']) ? $request['description'] : NULL;
        $post->content        = isset($request['content']) ? $request['content'] : NULL;
        $post->title_seo      = isset($request['title_seo']) ? $request['title_seo'] : NULL;
        $post->meta_key       = isset($request['meta_key']) ? $request['meta_key'] : NULL;
        $post->meta_des       = isset($request['meta_des']) ? $request['meta_des'] : NULL;
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/post/'.$filename));
            $post->image = 'upload/post/'.$filename;
        }
        $post->save();
        return redirect()->route('admin.post.list')->with('success','Add Post Success !');
    }
    public function update($id) {
        $cate_post         = Cate_post::select('id','name','parent_id')->get()->toArray();
        $post              = Post::findOrFail($id);

        return view('admin.post.edit', compact('cate_post', 'post'));
    }
    public function postUpdate($id, Request $request)
    {
        $post                 = Post::findOrFail($id);
        $post->name           = $request['name'];
        $post->slug           = Str::slug($post->name);
        $post->cate_post_id   = isset($request->cate_post_id) ? $request->cate_post_id : 0;
        $post->position       = isset($request['position']) ? $request['position'] : NULL;
        $post->user_id        = Auth::user()->id;
        $post->status         = (is_null($request['status']) ? '0' : '1');
        $post->is_home        = (is_null($request['is_home']) ? '0' : '1');
        $post->description    = isset($request['description']) ? $request['description'] : NULL;
        $post->content        = isset($request['content']) ? $request['content'] : NULL;
        $post->title_seo      = isset($request['title_seo']) ? $request['title_seo'] : NULL;
        $post->meta_key       = isset($request['meta_key']) ? $request['meta_key'] : NULL;
        $post->meta_des       = isset($request['meta_des']) ? $request['meta_des'] : NULL;
        if($request->hasFile('image'))
        {
            if(file_exists($post->image))
            {
                unlink($post->image);
            }
            $image    = $request->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/post/'.$filename));
            $post->image = 'upload/post/'.$filename;

        }
        $post->save();

        return redirect()->route('admin.post.list')->with('success','Edit Post Success');
    }
    public function destroy($id) {
        $result  = Post::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
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
                    $check_value = Post::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        Post::whereIn('id',$arrValue)->update(['status' => CateEnum::Active]);
                    }
                    break;
                case CateEnum::InActive :
                    $check_value = Post::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        Post::whereIn('id',$arrValue)->update(['status' => CateEnum::InActive ]);
                    }
                    break;
                case CateEnum::Delete :
                    $check_value = Post::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        Post::whereIn('id',$arrValue)->delete();
                    }
                    break;
            }
            return back()->with('success','Processed Successfully');
        }
    }
}
