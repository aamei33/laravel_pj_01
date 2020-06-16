<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Auth;
class SessionsController extends Controller
{
    //
    public function create(){
        return view('Sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);

/*
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 该用户存在于数据库，且邮箱和密码相符合
        }
   */

        if(Auth::attempt($credentials)){
            //登录成功后的相关操作
            session()->flash('success','欢迎回来！');
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            //登录错误的相关操作
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();

        }

        return;

    }
    public function destroy(){
        Auth::logout();
        session()->flash('success','您已成功退出！');
        return redirect('login');

    }
}
