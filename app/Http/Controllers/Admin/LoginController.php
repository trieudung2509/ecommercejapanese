<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller {
    public function getLogin() {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        } else {
            return view('admin.login');
        }
    }
    public function postLogin(Request $request) {
        $login = [
            'email'     => $request->email,
            'password'  => $request->password,
            'status'    => 1,
        ];
        $remember_me  = ($request->remember_me == 'on') ? true : false;
        if (Auth::attempt($login, $remember_me)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('error', 'Email or password is incorrect');
        }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('admin.getLogin');
      
    }
}