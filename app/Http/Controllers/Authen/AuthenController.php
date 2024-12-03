<?php

namespace App\Http\Controllers\Authen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function register() {
        return view('authen.register');
    }

    public function check_register() {
        request()->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
            'phone'=>'required|max:10',
            'gender'=>'required',
            'birthday'=>'required',
        ]);

        $data = request()->only('name','email','password','phone','gender','birthday');
        $data['password'] = bcrypt(request('password'));

        // dd($data);

        if(User::create($data)) {
            return redirect()->route('authen.login');
        }else{
            return redirect()->back();
        }
        
    }

    public function login() {
        return view('authen.login');
    }

    public function check_login() {
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
    
        $data = request()->only('email', 'password');

        // dd($data);

        if(auth()->attempt($data)){

            $role = auth()?->user()?->role;
            if($role != 0) {
                return redirect()->route('client.home')->with('suc', 'dang nhap thanh cong');
            }else{
                return redirect()->route('admin.dashboard')->with('suc', 'dang nhap thanh cong');
            }
            
        }else{
             return redirect()->back();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('authen.login');
    }
}
