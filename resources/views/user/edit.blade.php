@extends('layouts.default')
@section('title','注册页title')
@section('content')
    <h1>修改页面</h1>
    @include('public._errors')
    @include('public._messages')
    <form action="{{ route('users.update', $user->id )}}" method="post">
        {{ method_field('PATCH') }}
        @csrf
        姓名:<br>
        <input type="text" name="name" value="{{$user->name}}"><br>
        密码:<br>
        <input type="text" name="password" value=""><br>
        再次一遍密码:<br>
        <input type="text" name="password_confirmation" value=""><br>
        邮箱:<br>
        <input type="text" name="email" value="{{$user->email}}"><br><br>
        <input type="submit" value="更新">
    </form>
@stop
