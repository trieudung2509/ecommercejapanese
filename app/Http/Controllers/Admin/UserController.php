<?php 

namespace App\Http\Controllers\Admin;

use App\Enum\CateEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Image,Hash;
class UserController extends Controller
{
    public function index(Request $request) {
        if (isset($request->search)) {
            $list_users = User::where('name','like', '%'.$request->search.'%')->paginate(10);
        } else {
            $list_users = User::paginate(10);
        }
    	return view('admin.users.list', compact('list_users'));
    }
    public function create()
    {
    	return view('admin.users.create');
    }
    public function createUser(UserRequest $request) {
        $user                 = new User;
        $user->name           = $request['name'];
        $user->email           = $request['email'];
        $user->password           = Hash::make($request['password']);
        $user->description    = isset($request['description']) ? $request['description'] : NULL;
        $user->status         = (is_null($request['status']) ? '0' : '1');
        if($request->hasFile('avatar')){
            $image    = $request->file('avatar');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/users/'.$filename));
            $user->avatar = 'upload/users/'.$filename;
        }
        $user->save();

    	return redirect()->route('admin.users.list')->with('success','Add User Success !');
    }
    public function update($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            abort(404);
        }
    	return view('admin.users.edit', compact('user'));
    }

    public function postUpdate($id, UserRequest $request) {

        $user                 = User::findOrFail($id);
        $user->name           = $request['name'];
        $user->email          = $request['email'];
        $user->description    = isset($request['description']) ? $request['description'] : NULL;
        $user->status         = (is_null($request['status']) ? '0' : '1');
        if (!empty($request['password_news'])) {
            $user->password       = Hash::make($request['password_news']);
        }
        if($request->hasFile('avatar')){
            if(file_exists($user->avatar)) {
                unlink($user->avatar);
            }
            $image    = $request->file('avatar');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/users/'.$filename));
            $user->avatar = 'upload/users/'.$filename;
        }
        $user->save();

    	return redirect()->route('admin.users.list')->with('success','Edit User Success !');
    }

    public function destroy($id) {
        $user  = User::findOrFail($id);
        if (!$user) {
            abort(404);
        }
        
        if (file_exists($user->avatar)) {
            unlink($user->avatar);
        }
        $user->delete();
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
                    $check_value = User::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        User::whereIn('id',$arrValue)->update(['status' => CateEnum::Active]);
                    }
                break;
                case CateEnum::InActive :
                    $check_value = User::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        User::whereIn('id',$arrValue)->update(['status' => CateEnum::InActive ]);
                    }
                break;
                case CateEnum::Delete :
                    $check_value = User::whereIn('id',$arrValue)->get();
                    if (count($check_value) > 0) {
                        User::whereIn('id',$arrValue)->delete();
                    }
                break;
            }
            return back()->with('success','Processed Successfully');
        }
    }
}