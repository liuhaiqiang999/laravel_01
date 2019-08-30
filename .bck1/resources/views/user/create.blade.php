@extends('layouts.default')
@section('title','注册页title')
@section('content')
    <h1>注册页面</h1>
    @include('public._errors')
    <form action="{{route('users.store')}}" method="post">
        @csrf
        姓名:<br>
        <input type="text" name="name" value="{{old('name')}}"><br>
        密码:<br>
        <input type="text" name="password" value="{{old('password')}}"><br>
        邮箱:<br>
        <input type="text" name="email" value="{{old('email')}}"><br><br>
        <input type="submit" value="提交">
    </form>
@stop
