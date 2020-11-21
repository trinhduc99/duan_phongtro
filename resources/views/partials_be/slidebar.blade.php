<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{asset('back_end/dist/img/AdminLTELogo.png')}}" alt="logo trang quản lý sách"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Trinh Van Duc</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{url('/')}}" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt">
                    </i>
                    <span>TRANG CHỦ</span>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="fa-fw fas fa-users-cog">
                        </i>
                        <p>
                            <span>QUẢN LÝ TÀI KHOẢN</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.user') }}" class="nav-link ">
                                <i class="fa-fw fas fa-users">
                                </i>
                                <p>
                                    <span>Tài khoản User</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("admin.users.admin")}}" class="nav-link ">
                                <i class="fa-fw fas fa-users"></i>
                                <p>
                                    <span>Tài khoản Admin</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>QUẢN LÝ DANH MỤC</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Danh sách danh mục
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>BÀI ĐĂNG</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.all-post') }}" class="nav-link">

                                <i class="nav-icon fas fa-portrait"></i>
                                <p>
                                    TẤT CẢ BÀI ĐĂNG
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.posts.pending-post')}}" class="nav-link ">
                                <i class="nav-icon fas fa-portrait">
                                </i>
                                <p>
                                    BÀI ĐĂNG CHỜ DUYỆT
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.approved-post') }}" class="nav-link ">
                                <i class="nav-icon fas fa-portrait">
                                </i>
                                <p>
                                    BÀI ĐĂNG ĐÃ DUYỆT
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.denied-post') }}" class="nav-link ">
                                <i class="nav-icon fas fa-portrait">
                                </i>
                                <p>
                                    BÀI ĐĂNG BỊ TỪ CHỐI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.violate-post') }}" class="nav-link ">
                                <i class="nav-icon fas fa-portrait">
                                </i>
                                <p>
                                    BÀI ĐĂNG VI PHẠM
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>QUẢN LÝ KHÁC</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Danh sách lợi thế
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Danh sách dịch vụ
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>DANH SÁCH Permission</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Danh sách permission
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link nav-dropdown-toggle" href="">
                        <i class="fa-fw fas fa-cogs">
                        </i>
                        <p>
                            <span>Danh Sách vai tr</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Danh sách vai tro
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

