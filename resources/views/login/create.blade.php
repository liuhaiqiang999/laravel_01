@extends('layouts.default')
@section('title','注册页title')
@section('content')
    <h1>登录页面</h1>
    @include('public._errors')
    <form action="{{route('login')}}" method="post">
        @csrf
        姓名:<br>
        <input type="text" name="name" value="{{old('name')}}"><br>
        密码:<br>
        <input type="text" name="password" value="{{old('password')}}"><br><br>
        记住我:<br>
        <input type="checkbox" value="1" name="remember">
        <input type="submit" value="提交">
    </form>
@stop
