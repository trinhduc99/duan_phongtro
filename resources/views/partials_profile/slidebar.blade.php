@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('Admin/dist/img/user.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$user->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <div class="sidebar-form">
            <p class="white text-bold">Mã thành viên {{$user->id}}</p>
            <p class="white text-bold">Số dư: {{number_format($user->amount)}} vnd </p>
            <a href="" class="btn btn-primary">Nap Tien</a>
            <a href="{{route('profile.create')}}" class="btn btn-bitbucket">Dang tin</a>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><a href="{{route('profile.index')}}"><i class="fa fa-dashboard"></i>Trang Chủ</a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Quản lý bài </a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Trang cá nhân</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Sửa thông tin cá nhân</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Dịch Vụ</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Lịch sử nạp tiền </a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Lịch sử thanh toán</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Bảng giá dịch vụ</a></li>
                </ul>
            </li>
{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-share"></i> <span>Multilevel</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
{{--                    <li class="treeview">--}}
{{--                        <a href="#"><i class="fa fa-circle-o"></i> Level One--}}
{{--                            <span class="pull-right-container">--}}
{{--                  <i class="fa fa-angle-left pull-right"></i>--}}
{{--                </span>--}}
{{--                        </a>--}}
{{--                        <ul class="treeview-menu">--}}
{{--                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
{{--                            <li class="treeview">--}}
{{--                                <a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
{{--                                    <span class="pull-right-container">--}}
{{--                      <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                                </a>--}}
{{--                                <ul class="treeview-menu">--}}
{{--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </section>
</aside>
