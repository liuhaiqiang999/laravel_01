<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
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
            'email.required'=>'邮箱没填写',
            'email.email'=>'邮箱格式不对',
            'email.unique'=>'邮箱重复',
            'email.max'=>'邮箱长度不对',
        ];
        $this->validate($request, $roule,$msg);
        $user->name=$request->get('name');
        $user->password=encrypt($request->get('password'));
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
}
