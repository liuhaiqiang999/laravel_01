<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);

    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request,User $user){
        //1.数据校验工作
        $roule =[
            'name'=>'required',
            'email' => 'required|email|unique:users|max:20',
            'password'=>'required',
        ];
        $msg = [
            'name.required'=>'账号没有填写',
            'password.required'=>'密码没有填写',
            'email.required'=>'邮箱没填写',
            'email.email'=>'邮箱格式不对',
            'email.unique'=>'邮箱重复',
            'email.max'=>'邮箱长度不对',
        ];
        $this->validate($request, $roule,$msg);
        $user->name=$request->get('name');
        $user->password=Hash::make($request->get('password'));
        $user->email=$request->get('email');
        $user->save();
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show',[$user->id]);
    }

    public function show(User $user){

        return view('user.show',compact('user'));
    }

    public function index(User $user){

    }

    public function edit(User $user){
        $this->authorize('update', $user);

        return view('user.edit',compact('user'));
    }

    public function update(Request $request,User $user){
        $this->authorize('update', $user);
        $roule =[
            'name'=>'max:10',
            'email' => 'email|unique:users|max:20',
            'password'=>'confirmed|max:50',
        ];
        $msg = [
            'name.max'=>'账号长度不对',
            'password.confirmed'=>'密码2次不正确',
            'password.max'=>'密码长度不对',
            'email.email'=>'邮箱格式不对',
            'email.unique'=>'邮箱重复',
            'email.max'=>'邮箱长度不对',
        ];
        $redata = $this->validate($request, $roule,$msg);
        if ($request->get('password')==null){
            unset($redata['password']);
        }else{
            $redata['password']=Hash::make($redata['password']);
        }
        $user->update($redata);
        session()->flash('success','修改成功');
        return redirect()->route('users.show',$user);
    }
}
