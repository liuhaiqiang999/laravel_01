<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{
    //

    public function destroy(){
        Auth::logout();
        session()->flash('success', '退出成功~');
        return redirect()->route('/');

    }
    public function create(){
        return view('login.create');
    }
    public function store(Request $request){

        $roule =[
            'name'=>'required',
            'password'=>'required',
        ];
        $msg = [
            'name.required'=>'账号没有填写',
            'password.required'=>'密码没有填写',
        ];
        $redata = $this->validate($request, $roule,$msg);

        //1.进行账号和密码的验证

        $rebool = Auth::attempt($redata,$request->has('remember'));

        if ($rebool){
            session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);
//            return redirect()->route('users.show',[Auth::user()->id]);
        }
        return redirect()->back()->withInput()->withErrors('登陆失败账号或者密码不正确');
    }
}
