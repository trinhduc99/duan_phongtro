@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<div class="user_quick_info js-mobile-user-quick-info">
    <p class="p1">Xin chào <strong>{{$user->name}}</strong>. Mã tài khoản:
        <strong>{{$user->id}}</strong></p>
    <p class="p2">Số dư TK của bạn là: <strong>{{number_format($user->amount)}} vnđ</strong></p>
</div>
