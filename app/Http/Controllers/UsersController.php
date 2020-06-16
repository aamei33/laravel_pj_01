<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UsersController extends Controller
{
    //

    public function __construct()
    {
        //路由中  除了show create store 其他的都需要登录
        //相反的还有 only 白名单方法，将只过滤指定动作。
        //我们提倡在控制器 Auth 中间件使用中，首选 except 方法，
        //这样的话，当你新增一个控制器方法时，默认是安全的，此为最佳实践。
        $this->middleware('auth',[
            'except'=>['show','create','store','index']
            ]

        );
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function show(User $user){

        return view('users.show',compact('user'));
        //compact() 函数创建一个包含变量名和它们的值的数组。
    }


    public function store(Request $request)
    {
        // $this->validate($request,[ key1=>value1,key2=>value2 ])

        //required 不能为空  uqique:users 对users表来说 唯一，不能重复
        //emial 邮箱验证 confirmd确认  max:min 最大最小
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success','欢迎，您将在这里开启一段新的路程~');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user){
        //authorize 方法接收两个参数，第一个为授权策略的名称，第二个为进行授权验证的数据。
        $this->authorize('update', $user);
        return view('users.edit',compact('user'));

    }

    public function update(User $user , Request $request){
        $this->authorize('update', $user);
        $this->validate($request,[
            'name' =>'required| max:50',
             //密码允许为空
             'password' => 'nullable | confirmed |min:6'
            ]);
        $data = [];
        $data['name'] =$request->name;
        $data['password'] = bcrypt($request->password);
        $user->update($data);
        session()->flash('seuccess','个人资料更新成功！');
        return redirect()->route('users.show',$user->id);

    }

    public function index(){
        //$users =  User::all();
        //添加分页
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }


}
