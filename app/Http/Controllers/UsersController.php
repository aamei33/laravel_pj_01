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


    }
}
