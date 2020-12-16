@extends('layouts.profile')
@section('title_profile')
    Đăng tin mới
@endsection
@section('css_profile')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('Admin/bower_components/drop-image/dist/imageuploadify.min.css')}}" rel="stylesheet"/><br
        type="_moz">
@endsection
@section('js_profile')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset('Admin/bower_components/drop-image/imageuploadify.js')}}"></script>
    <script src="{{asset('Admin/bower_components/jquery/validate/jquery.validate.min.js')}}"></script>
    <script>
        CKEDITOR.replace('acc_description');
        $('input[type="file"]').imageuploadify();
    </script>
    <script src="{{asset('Admin/dist/js/profile.js')}}"></script>
    <script src="{{asset('Admin/dist/js/validate.js')}}"></script>
    <script src="{{asset('Admin/dist/js/main.js')}}"></script>
@endsection
@section('title_profile')
    Đăng tin mới
@endsection
@section('contents_profile')
    <br><br><br>
    <section class="content-header">
        <h1>Trang chủ</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li class="active">Quản lý</li>
            <li class="active">Đăng tin mới</li>
        </ol>
    </section>
    <section class="content ml-5">
        <form id="form_dangtin" class="ml-12"
              action="{{url('/dang-tin-moi/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <section class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Địa chỉ cho thuê</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="province" class="col-form-label ">Tỉnh/Thành phố</label>
                                <select id="province" name="province" size='1'
                                        class="form-control js-example-basic-single">
                                    <option value=''>-- Chọn Tỉnh/TP --</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="district">Quận/Huyện</label>
                                <select name="district" id="district"
                                        class="form-control js-example-basic-single">
                                    <option value="">chọn quận huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="ward">Phường/Xã</label>
                                <select class="form-control js-example-basic-single" name="ward" id="ward">
                                    <option value="">chọn phường xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-form-label" for="street">Đường/Phố</label>
                                <select class="form-control js-example-basic-single" name="street" id="street">
                                    <option value="">Chọn đường phố</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-form-label" for="project">Chọn các địa điểm chính gần nhất gần
                                    nhất</label>
                                <select name="project[]" id="project"
                                        class="form-control js-example-basic-single "
                                        multiple>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street_number" class="col-form-label">Số nhà</label>
                                <input type="text" class="form-control"
                                       name="street_number" id="street_number" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="acc_address" class="col-form-label">Địa chỉ chính xác</label>
                                <input type="text" readonly class="form-control" name="acc_address" id="acc_address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <div class="col-md-12">
                            <h2>Thông tin mô tả</h2>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acc_title" class="col-md-12 col-form-label">Tiêu đề</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="acc_title" id="acc_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-12 col-form-label">Thông tin liên hệ</label>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                @php
                                    $user = \Illuminate\Support\Facades\Auth::user()
                                @endphp
                                <input id="phone" type="text" name="phone" class="form-control"
                                       value="{{$user->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acc_price" class="col-md-12 col-form-label">Giá cho thuê</label>
                        <div class="col-md-12">
                            <div class="input-group col-md-6">
                                <input id="acc_price" name="acc_price" type="text"
                                       class="form-control">
                                <span class="input-group-addon">đồng</span>
                            </div>
                            <small class="form-text text-muted">Nhập đầy đủ số, ví dụ 1 triệu thì nhập là
                                1000000</small>
                            <div class="show_money_text"></div>
                            <div class="alert alert-info mb-5" style="height: auto" role="alert">
                                <p>Hơn 50% người xem tin sẽ không liên lạc khi tin đăng không có giá hoặc giá không hợp
                                    lý </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acc_area" class="col-md-12 col-form-label mb-3">Diện tích</label>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input id="acc_area" type="text" name="acc_area"
                                       class="form-control">
                                <span class="input-group-addon">m<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 col-form-label left mb-3" for="acc_type_toilet">Nhà vệ
                            sinh</label>
                        <div class="left mb-3">
                            @foreach($acc_type_toilets as $acc_type_toilet)
                                <label class="radio-inline col-md-3 ">
                                    <input type="radio" name="acc_type_toilet" value="{{$acc_type_toilet['id']}}"/>
                                    <label for="nha_ve_sinh_option"
                                           class="font__normal">{{$acc_type_toilet['name']}}</label>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="acc_close_time" class="col-md-12 col-form-label">Giờ đóng cửa</label>
                        <div class="col-md-4">
                            <select class="form-control" id="acc_close_time" name="acc_close_time">
                                @foreach($acc_close_times as $acc_close_time)
                                    <option value="{{$acc_close_time['id']}}">{{$acc_close_time['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="acc_electric_price" class="col-md-12 price col-form-label mb-3">Giá
                                điện</label>
                            <div class="input-group row price">
                                <input id="acc_electric_price" type="text"
                                       name="acc_electric_price"
                                       class="form-control col-md-6">
                                <span class="input-group-addon"
                                      style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
                                <select class="form-control col-md-6" id="acc_electric_calculate_method"
                                        name="acc_electric_calculate_method">
                                    @foreach($acc_electric_calculate_methods as $acc_electric_calculate_method)
                                        <option
                                            value="{{$acc_electric_calculate_method['id']}}">{{$acc_electric_calculate_method['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="acc_water_price" class="col-md-12 col-form-label price mb-3">Giá nước</label>
                            <div class="input-group mb-4">
                                <input id="acc_water_price" type="text" name="acc_water_price"
                                       class="form-control">
                                <span class="input-group-addon"
                                      style="width:0; padding-left:0; padding-right:0; border:none;"></span>
                                <select class="form-control" id="acc_water_calculate_method"
                                        name="acc_water_calculate_method">
                                    @foreach($acc_water_calculate_methods as $acc_water_calculate_method)
                                        <option
                                            value="{{$acc_water_calculate_method['id']}}">{{$acc_water_calculate_method['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="acc_internet_price" class="col-md-12 col-form-label">Giá internet</label>
                        <div class="col-md-12">
                            <div class="input-group col-md-6">
                                <input id="acc_internet_price" name="acc_internet_price"
                                       type="text" class="form-control">
                                <span class="input-group-addon">đồng</span>
                            </div>
                            <small class="form-text text-muted">Nhập đầy đủ số, ví dụ 1 triệu thì nhập là
                                1000000</small>
                            <div class="money_text_internet"></div>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="acc_deposit_price" class="col-md-12 col-form-label">Yêu cầu đặt cọc</label>
                        <div class="col-md-6">
                            <select class="form-control" id="acc_deposit_price" name="acc_deposit_price">
                                @foreach($acc_deposit_prices as $acc_deposit_price)
                                    <option
                                        value="{{$acc_deposit_price['id']}}">{{$acc_deposit_price['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group checkbox_group">
                                <label class="col-md-12 col-form-label price left mb-3" for="acc_user_gender">
                                    Giới tính khách thuê:</label>
                                <div class="col-sm-12">
                                    @foreach($acc_user_genders as $acc_user_gender)
                                        <label class="radio-inline col-md-3 genders">
                                            <input type="radio" name="acc_user_gender"
                                                   class="css-checkbox" value="{{$acc_user_gender['id']}}">
                                            <label for="acc_user_gender"
                                                   class="font__normal">{{$acc_user_gender['name']}}</label>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group checkbox_group">
                                <label class="col-md-12 col-form-label price left mb-3" for="">
                                    Đối tượng khách mà bạn muốn cho thuê:</label>
                                <div class="row">
                                    @foreach( $acc_user_objects as $acc_user_object)
                                        <div class="col-md-3 col-sm-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="acc_user_object[]"
                                                       value="{{$acc_user_object['id']}}"
                                                       class="css-checkbox lrg"
                                                       multiple>
                                                <label for="" class="font__normal">{{$acc_user_object['name']}}</label>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="form-group checkbox_group">
                                <label class="col-md-12 col-form-label price left mb-3" for="">Lợi thế phòng trọ, nhà
                                    trọ của
                                    bạn</label>
                                <div class="row">
                                    @foreach($items as $item)
                                        <div class="col-md-4 col-sm-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="acc_item[]"
                                                       value="{{$item->id}}" class="css-checkbox lrg">
                                                <label for="acc_item"
                                                       class="font__normal">{{$item->name}}</label>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-md-12">
                            <h3>Hình ảnh <span id="counter"></span></h3>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p>Hình ảnh rõ ràng sẽ được lựa chọn nhanh hơn</p>
                            {{--                            <div class="form-group">--}}
                            {{--                                <input type="file" accept="image/*" multiple name="acc_image[]">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="post_content" class="col-md-12 col-form-label">Nội dung mô tả</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="acc_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <div class="col-md-12">
                            <h3>Chọn hình thức đăng tin</h3>
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <div class="col-md-12">
                            <h4>Bảng giá tham khảo</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Loại tin</th>
                                        <th>Gói ngày</th>
                                        <th>Gói tuần (7 ngày)</th>
                                        <th>Gói tháng (30 ngày)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><span
                                                style="color: #E13427; font-weight: bold;">Tin VIP nổi bật</span>
                                        </td>
                                        <td class="right"><span class="spanprice">50.000 <span
                                                    style="color: #898989;">đ/ngày</span></span></td>
                                        <td class="right"><span class="spanprice">315.000 <span
                                                    style="color: #898989;">đ/tuần</span></span><span
                                                class="subpriceday">45.000 đ/ngày</span></td>
                                        <td class="right"><span class="spanprice">1.200.000 <span
                                                    style="color: #898989;">đ/tháng</span></span><span
                                                class="subpriceday">40.000 đ/ngày</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: #E13427; font-weight: bold;">Tin VIP 1</span>
                                        </td>
                                        <td class="right"><span class="spanprice">30.000 <span
                                                    style="color: #898989;">đ/ngày</span></span></td>
                                        <td class="right"><span class="spanprice">190.000 <span
                                                    style="color: #898989;">đ/tuần</span></span><span
                                                class="subpriceday">27.143 đ/ngày</span></td>
                                        <td class="right"><span class="spanprice">800.000 <span
                                                    style="color: #898989;">đ/tháng</span></span><span
                                                class="subpriceday">26.667 đ/ngày</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: #f60; font-weight: bold;">Tin VIP 2</span></td>
                                        <td class="right"><span class="spanprice">20.000 <span
                                                    style="color: #898989;">đ/ngày</span></span></td>
                                        <td class="right"><span class="spanprice">133.000 <span
                                                    style="color: #898989;">đ/tuần</span></span><span
                                                class="subpriceday">19.000 đ/ngày</span></td>
                                        <td class="right"><span class="spanprice">540.000 <span
                                                    style="color: #898989;">đ/tháng</span></span><span
                                                class="subpriceday">18.000 đ/ngày</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: #3763e0; font-weight: bold;">Tin VIP 3</span>
                                        </td>
                                        <td class="right"><span class="spanprice">10.000 <span
                                                    style="color: #898989;">đ/ngày</span></span></td>
                                        <td class="right"><span class="spanprice">63.000 <span
                                                    style="color: #898989;">đ/tuần</span></span><span
                                                class="subpriceday">9.000 đ/ngày</span></td>
                                        <td class="right"><span class="spanprice">240.000 <span
                                                    style="color: #898989;">đ/tháng</span></span><span
                                                class="subpriceday">8.000 đ/ngày</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="color: #055699; font-weight: bold;">Tin thường</span>
                                        </td>
                                        <td class="right"><span class="spanprice">2.000 <span
                                                    style="color: #898989;">đ/ngày</span></span></td>
                                        <td class="right"><span class="spanprice">12.000 <span
                                                    style="color: #898989;">đ/tuần</span></span><span
                                                class="subpriceday">1.714 đ/ngày</span></td>
                                        <td class="right"><span class="spanprice">48.000 <span
                                                    style="color: #898989;">đ/tháng</span></span><span
                                                class="subpriceday">1.600 đ/ngày</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label for="post_package" class="col-form-label">Chọn loại tin</label>
                                <select class="form-control" id="acc_new" name="acc_new">
                                    @foreach($acc_news as $acc_new)
                                        @if($acc_new['id'] == 1)
                                            <option value={{$acc_new['id']}} selected>{{$acc_new['name']}}</option>
                                        @else
                                            <option value={{$acc_new['id']}}>{{$acc_new['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label for="post_cat" class="col-form-label">Gói thời gian</label>
                                <select class="form-control" id="acc_new_type" name="acc_new_type">
                                    @foreach($acc_new_types as $acc_new_type)
                                        @if($acc_new_type['id'] == 'day')
                                            <option
                                                value={{$acc_new_type['id']}} selected>{{$acc_new_type['name']}}</option>
                                        @else
                                            <option value="{{$acc_new_type['id']}}">{{$acc_new_type['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="js-package-type js-package-type-day">
                                    <label class="col-form-label number_type" for="">Số ngày</label>
                                    <select class="form-control js-package-type-2" name="acc_new_type_day"
                                            id="js-package-type-day2">
                                        @foreach($acc_new_type_days as $acc_new_type_day)
                                            @if($acc_new_type_day['id'] == 5)
                                                <option
                                                    value={{$acc_new_type_day['id']}} selected>{{$acc_new_type_day['name']}}</option>
                                            @else
                                                <option
                                                    value="{{$acc_new_type_day['id']}}">{{$acc_new_type_day['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="js-package-type js-package-type-week hidden">
                                    <label class="col-form-label number_type">Số tuần</label>
                                    <select class="form-control js-package-type-2" name="acc_new_type_week"
                                            id="js-package-type-week2">
                                        @foreach($acc_new_type_weeks as $acc_new_type_week)
                                            @if($acc_new_type_week['id'] == 3)
                                                <option
                                                    value={{$acc_new_type_week['id']}} selected>{{$acc_new_type_week['name']}}</option>
                                            @else
                                                <option
                                                    value="{{$acc_new_type_week['id']}}">{{$acc_new_type_week['name']}}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group js-package-type js-package-type-month hidden">
                                    <label class="col-form-label number_type">Số tháng</label>
                                    <select class="form-control js-package-type-2" name="acc_new_type_month"
                                            id="js-package-type-month2">
                                        @foreach($acc_new_type_months as $acc_new_type_month)
                                            @if($acc_new_type_month['id'] == 2)
                                                <option
                                                    value={{$acc_new_type_month['id']}} selected>{{$acc_new_type_month['name']}}</option>
                                            @else
                                                <option
                                                    value="{{$acc_new_type_month['id']}}">{{$acc_new_type_month['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <div class="">
                                    <label class="col-form-label" for="formGroupInputSmall">Chọn ngày đăng tin</label>
                                    <input type="date" id="new_start_day" name="new_start_day"
                                           value="{{$day_now}}"
                                           min="2018-01-01" max="2050-01-01">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="post_package" class="col-form-label">Phương thức thanh toán
                        </label>
                    </div>
                    <div>
                        @php
                            $user = \Illuminate\Support\Facades\Auth::user();
                        @endphp
                        Trừ tiền trong tài khoản <b>nhatro.com</b> (Bạn đang có TK
                        Chính: {{number_format($user->amount)}} vnđ)
                        <p style="color: red; font-weight: normal" class="js-note-outofmoney hidden">Số tiền
                            trong tài khoản
                            của bạn không đủ để thực hiện thanh toán, vui lòng <a
                                href="#">nạp tiền</a>
                            tiền vào tài khoản</p>
                    </div>
                    <div class="form-group row mt-5">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success mb-5 btn-lg btn-block">Hoàn tất & Thanh
                                toán (<span class="js-package-grand-total">0đ</span>)
                            </button>
                        </div>
                    </div>
                </section>
                <section class="col-lg-4">
                    <div class="card mb-5"
                         style="color: #856404; background-color: #fff3cd; border-color: #ffeeba;">
                        <div class="card-body">
                            <h4 class="card-title">Lưu ý khi đăng tin</h4>
                            <ul>
                                <li style="list-style-type: square; margin-left: 15px;">Nội dung phải viết bằng
                                    tiếng Việt có dấu
                                </li>
                                <li style="list-style-type: square; margin-left: 15px;">Tiêu đề tin không dài
                                    quá 100 kí tự
                                </li>
                                <li style="list-style-type: square; margin-left: 15px;">Các bạn nên điền đầy đủ
                                    thông tin vào các mục để tin đăng có hiệu quả hơn.
                                </li>
                                <li style="list-style-type: square; margin-left: 15px;">Để tăng độ tin cậy và
                                    tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên
                                    bản đồ bằng cách kéo icon tới đúng vị trí của tin rao.
                                </li>
                                <li style="list-style-type: square; margin-left: 15px;">Tin đăng có hình ảnh rõ
                                    ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng
                                    ảnh để được giao dịch nhanh chóng!
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="maps" style="width:100%; height:2247px; margin-bottom: 30px;"></div>
                    <div class="card" style="background-color: #f1f1f1;">
                        <div class="card-body">
                            <h5 class="card-title">Thông tin thanh toán</h5>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>Bạn đang có:</td>
                                    <td>{{number_format($user->amount)}}đ</td>
                                </tr>
                                <tr>
                                    <td>Loại tin:</td>
                                    <td class="js-package-title">Tin thường</td>
                                </tr>
                                <tr>
                                    <td>Gói thời gian:</td>
                                    <td class="js-time-type">Đăng theo ngày</td>
                                </tr>
                                <tr>
                                    <td>Đơn giá:</td>
                                    <td class="js-package-price"> 2,000 vnd /ngày</td>
                                </tr>
                                <tr>
                                    <td class="content_type">Số ngày:</td>
                                    <td class="js-package-days">5</td>
                                </tr>
                                <tr>
                                    <td>Ngày hết hạn</td>
                                    <td class="js-package-deadline"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-class: middle;">Thành tiền:</td>
                                    <td><span style="font-size: 30px; font-weight: bold; color: #F90;"
                                              class="js-package-grand-total">10,000 vnđ</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </section>
@endsection
