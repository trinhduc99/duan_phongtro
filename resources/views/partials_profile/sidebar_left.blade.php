<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
             data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <div class="header-left">
                    <div id="userbox" class="userbox">
                        <a href="#" class="profile_img" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="{{asset('profile/images/!logged-user.jpg')}}" alt="Joseph Doe" class="img-circle"
                                     data-lock-picture="{{asset('profile/images/!logged-user.jpg')}}" />
                            </figure>
                            <div class="profile-info info">
                                <span class="profile_name">Trinh Van Đức</span>
                                <span class="profile_number">0988746131</span>
                            </div>
                            <div class="profile_dang_tin">
                                <a  class="btn btn-warning">Nạp tiền</a>
                                <a href="{{route('profile.create')}}"  class="btn btn-danger">Đăng tin</a>
                            </div>
                        </a>
                    </div>
                </div>
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>Quản lý tin đăng</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            <span>Sửa thông tin cá nhân</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                            <span>Nạp tiền vào tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <span>Lịch sử nạp tiền</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                            <span>Lịch sử thanh toán</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span>Bảng giá dịch vụ</span>
                        </a>
                    </li>
                    <li class="nav-active">
                        <a href="#">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <span>Thoát</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
