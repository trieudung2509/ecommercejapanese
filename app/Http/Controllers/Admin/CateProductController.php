<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cate_product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cate_productRequest;
use Image;
use Illuminate\Support\Str;
class CateProductController extends Controller
{
    public function index()
    {
    	$cate_product = Cate_product::all();
    	return view('admin.cate_product.index', compact('cate_product'));
    }

    public function create()
    {
        $category = Cate_product::select('id','name','parent_id')->get()->toArray();
    	return view('admin.cate_product.create', compact('category'));
    }
    public function postCreate(Cate_productRequest $request) {
        $cate_product                 = new Cate_product;
        $cate_product->name           = $request['name'];
        $cate_product->parent_id      = isset($request->parent_id) ? $request->parent_id : 0;
        $cate_product->slug           = Str::slug($cate_product->name);
        $cate_product->description    = isset($request['description']) ? $request['description'] : NULL;
        $cate_product->position       = isset($request['position']) ? $request['position'] : NULL;
        $cate_product->status         = (is_null($request['status']) ? '0' : '1');
        $cate_product->title_seo      = isset($request['title_seo']) ? $request['title_seo'] : NULL;
        $cate_product->meta_key      = isset($request['meta_key']) ? $request['meta_key'] : NULL;
        $cate_product->meta_des      = isset($request['meta_des']) ? $request['meta_des'] : NULL;
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/cate_product/'.$filename));
            $cate_product->image = 'upload/cate_product/'.$filename;
        }
        $cate_product->save();

    	return redirect()->route('admin.cate_product.index')->with('success','Add Category Product Success !');
    }
    public function update($id)
    {
        $category         = Cate_product::select('id','name','parent_id')->get()->toArray();
        $cate_product = Cate_product::findOrFail($id);

    	return view('admin.cate_product.edit', compact('cate_product', 'category'));
    }
    public function postUpdate($id, Request $request)
    {
        $cate_product                 = Cate_product::findOrFail($id);
        $cate_product->name           = $request['name'];
        $cate_product->parent_id      = isset($request->parent_id) ? $request->parent_id : 0;
        $cate_product->slug           = Str::slug($cate_product->name);
        $cate_product->description    = isset($request['description']) ? $request['description'] : NULL;
        $cate_product->position       = isset($request['position']) ? $request['position'] : NULL;
        $cate_product->status         = (is_null($request['status']) ? '0' : '1');
        $cate_product->title_seo      = isset($request['title_seo']) ? $request['title_seo'] : NULL;
        $cate_product->meta_key      = isset($request['meta_key']) ? $request['meta_key'] : NULL;
        $cate_product->meta_des      = isset($request['meta_des']) ? $request['meta_des'] : NULL;
    	if($request->hasFile('image'))
        {
            if(file_exists($cate_product->image))
            {
                unlink($cate_product->image);
            }
            $image    = $request->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/cate_product/'.$filename));
            $cate_product->image = 'upload/cate_product/'.$filename;

        }
    	$cate_product->save();

    	return redirect()->route('admin.cate_product.index')->with('success','Edit Category Product Success');
    }

    public function destroy($id)
    {
        $result  = Cate_product::findOrFail($id);
        $result2 = Cate_product::where('parent_id', $id)->first();
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
}
