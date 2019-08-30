<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Weibo App') - Laravel 新手入门教程</title>
    <link rel="stylesheet" href="{{asset('static/h-ui/css/H-ui.css')}}">
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-black">
        <div class="container cl">
            <nav class="nav navbar-nav nav-collapse" role="navigation" id="Hui-navbar">
                <ul class="cl f-r col-lg-8">
                    <li><a href="{{route('/')}}">首页</a></li>
                    <li><a href="{{route('login')}}">登录</a></li>
                    <li><a href="{{route('help')}}">帮助</a></li>
                    <li><a href="{{asset(route('about'))}}">关于</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="row  col-lg-8 text-c">
    @yield('content')
</div>








</body>
</html>
