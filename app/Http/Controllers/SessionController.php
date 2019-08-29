<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

    public function destroy(){}
    public function create(){
        return view('login.create');
    }
    public function store(){
        dd(123);
    }
}
