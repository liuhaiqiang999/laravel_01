@extends('layouts.default')
@section('title','注册页title')
@section('content')
    <h1>用户个人信息页面</h1>
    @include('public._messages')
    @include('public._user_info',['user'=>$user])
@stop
