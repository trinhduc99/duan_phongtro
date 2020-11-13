@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="user_info">
    <a href="#" class="clearfix">
        <div class="user_avatar"><img
                src="{{asset('profile/images/boy_1544603222.png')}}"></div>
        <div class="user_meta">
            <div class="inner">
                <div class="user_name">{{$user->name}}</div>
                <div class="user_verify">{{$user->phone}}</div>
            </div>
        </div>
    </a>
    <ul>
        <li><span>Mã thành viên:</span> <span> {{$user->id}}</span></li>
        <li><span>Số dư:</span> <span> {{number_format($user->amount)}} vnđ</span></li>
    </ul>
    <a class="btn btn-warning btn-sm mr-1" href="#">Nạp
        tiền</a>
    <a class="btn btn-danger btn-sm" href="{{route("profile.create")}}">Đăng
        tin</a>
</div>
