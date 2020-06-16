<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UsersController extends Controller
{
    //

    public function create(){
        return view('users.create');
    }

    public function show(User $user){

        return view('users.show',compact('user'));
        //compact() 函数创建一个包含变量名和它们的值的数组。
    }

    public function store(User $user, Request $request){


        // $this->validate($request,[ key1=>value1,key2=>value2 ])

        //required 不能为空  uqique:users 对users表来说 唯一，不能重复
        //emial 邮箱验证 confirmd确认  max:min 最大最小
        $this->validate($request,[
            'name' => 'required | unique:users |max:50',
            'email' => 'required | email | unique:users |max:255',
            'password' =>'required | confirmed|min:6'
        ]);
        return;



    }
}
