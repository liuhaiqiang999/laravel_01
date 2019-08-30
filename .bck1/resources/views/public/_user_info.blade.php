<h3>姓名是{{$user->name}}</h3>
<h3>邮箱是{{$user->email}}</h3>
<h3>创建时间是{{$user->created_at}}</h3>
<img src="{{$user->gravatar(140)}}" />