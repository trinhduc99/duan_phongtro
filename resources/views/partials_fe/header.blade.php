<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> timnhatro@gmail.com</li>
                            <li><i class="fa fa-phone"></i> 0988746131</li>
                            <li><i></i> support 24/7 time</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 ">

                        <div class="dropdown float-right">
                            <div class="header__cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                </ul>
                            </div>
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tài khoản
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('profile.index')}}">Quản lý tài khoản</a>
                                <a class="dropdown-item" href="{{route('profile.index')}}">Quản lý bài đăng</a>
                                <a class="dropdown-item" href="#">Tin đã xem</a>
                                <a class="dropdown-item" href="#">Tin đã lưu</a>
                                <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="#">Đăng xuất</a>
                            </div>
                        <div class="header__top__right__auth">
                            <a class="header__log p-2 btn btn-light ml-1"><i class="fa fa-user "></i> Đăng nhập</a>
                        </div>
                        <div class="header__top__right__auth">
                            <a class="header__log btn btn-light p-2 ml-1" href="#"><i class="fa fa-user "></i> Đăng ký</a>
                        </div>
                        <div class="header__top__right__auth ">
                            <a href="{{route('profile.create')}}" class="btn btn-danger p-2 ml-1" ><i class="fa"></i> Đăng tin miễn phí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="#"><img src="front_end/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-10">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="#">Trang Chủ</a></li>
                        <li><a href="#">Cho thuê phòng trọ</a></li>
                        <li><a href="#">Tìm người ở ghép</a></li>
                        <li><a href="#">Hướng dẫn</a></li>
                        <li><a href="#">Liện hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
</header>
