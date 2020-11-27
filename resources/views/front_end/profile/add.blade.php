@extends('layouts.profile')
@section('title_profile')
    Đăng tin mới
@endsection

@section('css_profile')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js_profile')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        CKEDITOR.replace('acc_description');
    </script>
    <script src="{{asset('Admin/dist/js/ profile.js')}}"></script>
    <script src="{{asset('Admin/dist/js/main.js')}}"></script>
@endsection
@section('title_profile')
    Đăng tin mới
@endsection
@section('contents_profile')
    <section class="content-header">
        <h1>
            Trang chủ
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
            <li class="active">Quản lý</li>
            <li class="active">Đăng tin mới</li>
        </ol>
    </section>
    <section class="content ml-5">
        <form id="form_dangtin" class="ml-10"
              action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <section class="col-lg-8 connectedSortable">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Địa chỉ cho thuê</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="province" class="col-form-label ">Tỉnh/Thành phố</label>
                                    <select id="province" name="province"
                                            class="form-control js-example-basic-single" required
                                            data-msg-required="Chưa chọn Tỉnh/TP">
                                        <option value="">-- Chọn Tỉnh/TP --</option>
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
                                            class="form-control js-example-basic-single" required
                                            data-msg-required="Chưa chọn Quận/Huyện">
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
                                    <input type="text" readonly class="form-control" name="acc_address" id="acc_address"
                                           required data-msg-required="Chưa chọn khu vực đăng tin">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-12">
                                <h2>Thông tin mô tả</h2>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="post_cat" class="col-md-12 col-form-label">Loại chuyên mục</label>
                            <div class="col-md-6">
                                <select class="form-control" id="category_id" name="category_id" required
                                        data-msg-required="Chưa chọn loại chuyên mục">
                                    <option value="">-- Chọn loại tin --</option>
                                    @foreach($categories as  $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="acc_title" class="col-md-12 col-form-label">Tiêu đề</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="acc_title" id="acc_title" value=""
                                       minlength="30" maxlength="120" required
                                       data-msg-required="Tiêu đề không được để trống"
                                       data-msg-minlength="Tiêu đề quá ngắn" data-msg-maxlength="Tiêu đề quá dài">
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
                                           required data-msg-required="Số điện thoại"
                                           value="{{$user->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="acc_price" class="col-md-12 col-form-label">Giá cho thuê</label>
                            <div class="col-md-12">
                                <div class="input-group col-md-6">
                                    <input id="acc_price" name="acc_price" pattern="[0-9.]+" type="text"
                                           class="form-control" required data-msg-required="Bạn chưa nhập giá phòng"
                                           data-msg-min="Giá phòng chưa đúng">
                                    <div class="input-group-append">
                                        <span class="input-group-text">đồng</span>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Nhập đầy đủ số, ví dụ 1 triệu thì nhập là
                                    1000000</small>
                                <div class="alert alert-info mb-5" role="alert">
                                    <p>Hơn 50% người xem tin sẽ không liên lạc khi tin đăng không có giá hoặc giá không
                                        hợp
                                        lý </p>
                                </div>
                            </div>
                            <label for="acc_price_text" id="acc_price_text"
                                   class="col-sm-12 control-label js-number-text" style="color: red;"></label>
                        </div>
                        <div class="form-group row">
                            <label for="acc_area" class="col-md-12 col-form-label mb-3">Diện tích</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input id="acc_area" type="text" pattern="[0-9.]+" name="acc_area"
                                           max="1000" class="form-control" required
                                           data-msg-required="Bạn chưa nhập diện tích">
                                    <div class="input-group-append">
                                        <span class="input-group-text">m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_panel_body">
                            <div class="form-group checkbox_group ">
                                <label class="col-md-12 col-form-label left mb-2" for="acc_type_toilet">Nhà vệ
                                    sinh</label>
                                <div class="radio-group row post_cat_group">
                                    @foreach($acc_type_toilets as $acc_type_toilet)
                                        <label class="radio-inline col-md-4">
                                            <input type="radio" name="acc_type_toilet" class="css-checkbox"
                                                   value="{{$acc_type_toilet['id']}}"/>
                                            <label for="nha_ve_sinh_option"
                                                   class="css-label">{{$acc_type_toilet['name']}}</label>
                                        </label>
                                    @endforeach

                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="acc_close_time" class="col-md-12 col-form-label">Giờ đóng cửa</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="acc_close_time" name="acc_close_time" required
                                            data-msg-required="Chưa chọn loại chuyên mục">
                                        @foreach($acc_close_times as $acc_close_time)
                                            <option
                                                value="{{$acc_close_time['id']}}">{{$acc_close_time['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="acc_electric_price" class="col-md-12 col-form-label mb-3">Giá
                                        điện</label>
                                    <div class="input-group mb-3">
                                        <input id="acc_electric_price" type="number" pattern="[0-9.]+"
                                               name="acc_electric_price"
                                               class="form-control" required
                                               data-msg-required="Bạn chưa nhập giá điện ">
                                        <div class="input-group-append">
                                            <select class="form-control" id="acc_electric_calculate_method"
                                                    name="acc_electric_calculate_method" required
                                                    data-msg-required="Chưa chọn loại chuyên mục">
                                                @foreach($acc_electric_calculate_methods as $acc_electric_calculate_method)
                                                    <option
                                                        value="{{$acc_electric_calculate_method['id']}}">{{$acc_electric_calculate_method['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="acc_water_price" class="col-md-12 col-form-label mb-3">Giá nước</label>
                                    <div class="input-group mb-4">
                                        <input id="acc_water_price" type="text" pattern="[0-9.]+" name="acc_water_price"
                                               max="1000" class="form-control" required
                                               data-msg-required="Bạn chưa nhập g">
                                        <div class="input-group-append">
                                            <select class="form-control" id="acc_water_calculate_method"
                                                    name="acc_water_calculate_method" required
                                                    data-msg-required="Chưa chọn loại chuyên mục">
                                                @foreach($acc_water_calculate_methods as $acc_water_calculate_method)
                                                    <option
                                                        value="{{$acc_water_calculate_method['id']}}">{{$acc_water_calculate_method['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="acc_internet_price" class="col-md-12 col-form-label">Giá internet</label>
                                <div class="col-md-12">
                                    <div class="input-group col-md-6">
                                        <input id="acc_internet_price" name="acc_internet_price" pattern="[0-9.]+"
                                               type="text"
                                               class="form-control" required data-msg-required="Bạn chưa nhập giá phòng"
                                               data-msg-min="Giá phòng chưa đúng">
                                        <div class="input-group-append">
                                            <span class="input-group-text">đồng</span>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Nhập đầy đủ số, ví dụ 1 triệu thì nhập là
                                        1000000</small>
                                </div>
                                <label for="acc_internet_price" id="acc_internet_price_text"
                                       class="col-sm-12 control-label js-number-text" style="color: red;"></label>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="acc_deposit_price" class="col-md-12 col-form-label">Yêu cầu đặt cọc</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="acc_deposit_price" name="acc_deposit_price"
                                            required
                                            data-msg-required="Chưa chọn loại chuyên mục">
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
                                        <label class="col-md-12 col-form-label left mb-2" for="acc_user_gender">Giới
                                            tính khách
                                            thuê:</label>
                                        <div class="radio-group row post_cat_group">
                                            @foreach($acc_user_genders as $acc_user_gender)
                                                <label class="radio-inline col-md-4">
                                                    <input type="radio" name="acc_user_gender"
                                                           class="css-checkbox" value="{{$acc_user_gender['id']}}"
                                                           checked=&quot;checked&quot;/>
                                                    <label for="acc_user_gender"
                                                           class="css-label">{{$acc_user_gender['name']}}</label>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group checkbox_group">
                                        <label class="col-md-12 col-form-label left mb-2" for="">Đối tượng khách mà bạn
                                            muốn cho
                                            thuê:</label>
                                        <div class="row">
                                            @foreach( $acc_user_objects as $acc_user_object)
                                                <div class="col-md-3 col-sm-6">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="acc_user_object[]"
                                                               value="{{$acc_user_object['id']}}"
                                                               class="css-checkbox lrg"
                                                               multiple>
                                                        <label for="nguoi_di_lam"
                                                               class="css-label lrg">{{$acc_user_object['name']}}</label>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group checkbox_group">
                                        <label class="col-md-12 col-form-label left mb-2" for="">Lợi thế phòng trọ, nhà
                                            trọ của
                                            bạn</label>
                                        <div class="row">
                                            @foreach($items as $item)
                                                <div class="col-md-4 col-sm-6">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="acc_item[]"
                                                               value="{{$item->id}}" class="css-checkbox lrg">
                                                        <label for="acc_item"
                                                               class="css-label lrg">{{$item->name}}</label>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-md-12">
                                <h3>Hình ảnh</h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <p>Hình ảnh rõ ràng sẽ được lựa chọn nhanh hơn</p>
                                <div class="form-group">
                                    <div class="needsclick dropzone" id="document-dropzone">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-md-12 col-form-label">Nội dung mô tả</label>
                            <div class="col-md-12">
                                    <textarea class="form-control" name="acc_description" required
                                              minlength="100" data-msg-required="Bạn chưa nhập nội dung"
                                              data-msg-minlength="Nội dung tối thiểu 100 kí tự"></textarea>
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
                                    <table class="table table_banggia table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="text-align: left;">Loại tin</th>
                                            <th style="text-align: right;">Gói ngày</th>
                                            <th style="text-align: right;">Gói tuần (7 ngày)</th>
                                            <th style="text-align: right;">Gói tháng (30 ngày)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><span
                                                    style="color: #E13427; font-weight: bold;">Tin VIP nổi bật</span>
                                            </td>
                                            <td align="right"><span class="spanprice">50.000 <span
                                                        style="color: #898989;">đ/ngày</span></span></td>
                                            <td align="right"><span class="spanprice">315.000 <span
                                                        style="color: #898989;">đ/tuần</span></span><span
                                                    class="subpriceday">45.000 đ/ngày</span></td>
                                            <td align="right"><span class="spanprice">1.200.000 <span
                                                        style="color: #898989;">đ/tháng</span></span><span
                                                    class="subpriceday">40.000 đ/ngày</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color: #E13427; font-weight: bold;">Tin VIP 1</span>
                                            </td>
                                            <td align="right"><span class="spanprice">30.000 <span
                                                        style="color: #898989;">đ/ngày</span></span></td>
                                            <td align="right"><span class="spanprice">190.000 <span
                                                        style="color: #898989;">đ/tuần</span></span><span
                                                    class="subpriceday">27.143 đ/ngày</span></td>
                                            <td align="right"><span class="spanprice">800.000 <span
                                                        style="color: #898989;">đ/tháng</span></span><span
                                                    class="subpriceday">26.667 đ/ngày</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color: #f60; font-weight: bold;">Tin VIP 2</span></td>
                                            <td align="right"><span class="spanprice">20.000 <span
                                                        style="color: #898989;">đ/ngày</span></span></td>
                                            <td align="right"><span class="spanprice">133.000 <span
                                                        style="color: #898989;">đ/tuần</span></span><span
                                                    class="subpriceday">19.000 đ/ngày</span></td>
                                            <td align="right"><span class="spanprice">540.000 <span
                                                        style="color: #898989;">đ/tháng</span></span><span
                                                    class="subpriceday">18.000 đ/ngày</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color: #3763e0; font-weight: bold;">Tin VIP 3</span>
                                            </td>
                                            <td align="right"><span class="spanprice">10.000 <span
                                                        style="color: #898989;">đ/ngày</span></span></td>
                                            <td align="right"><span class="spanprice">63.000 <span
                                                        style="color: #898989;">đ/tuần</span></span><span
                                                    class="subpriceday">9.000 đ/ngày</span></td>
                                            <td align="right"><span class="spanprice">240.000 <span
                                                        style="color: #898989;">đ/tháng</span></span><span
                                                    class="subpriceday">8.000 đ/ngày</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color: #055699; font-weight: bold;">Tin thường</span>
                                            </td>
                                            <td align="right"><span class="spanprice">2.000 <span
                                                        style="color: #898989;">đ/ngày</span></span></td>
                                            <td align="right"><span class="spanprice">12.000 <span
                                                        style="color: #898989;">đ/tuần</span></span><span
                                                    class="subpriceday">1.714 đ/ngày</span></td>
                                            <td align="right"><span class="spanprice">48.000 <span
                                                        style="color: #898989;">đ/tháng</span></span><span
                                                    class="subpriceday">1.600 đ/ngày</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="color: #055699; font-weight: bold;">Tin miễn phí</span>
                                            </td>
                                            <td align="right"><span class="spanprice">2 lượt<span
                                                        style="color: #898989;">/ngày</span></span></td>
                                            <td align="right"><span class="spanprice">14 lượt <span
                                                        style="color: #898989;">đ/tuần</span></span><span
                                                    class="subpriceday">2 lượt/ngày</span></td>
                                            <td align="right"><span class="spanprice">48 lượt<span
                                                        style="color: #898989;">/tháng</span></span><span
                                                    class="subpriceday">2 lượt/ngày</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 js-group-package">
                                <div class="form-group">
                                    <label for="post_package" class="col-form-label">Chọn loại tin</label>
                                    <select class="form-control" id="post_package" name="package" required
                                            data-msg-required="Chưa chọn gói tin">
                                        <option value="">Chọn gói tin</option>
                                        <option value="5" selected>Tin thường</option>
                                        0
                                        <option value="4">Tin VIP 3</option>
                                        <option value="3">Tin VIP 2</option>
                                        <option value="2">Tin VIP 1</option>
                                        <option value="1">Tin VIP nổi bật</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 js-group-package-type">
                                <div class="form-group">
                                    <label for="post_cat" class="col-form-label">Gói thời gian</label>
                                    <select class="form-control" id="post_cat" name="package_type">
                                        <option value="day">Đăng theo ngày</option>
                                        <option value="week">Đăng theo tuần</option>
                                        <option value="month">Đăng theo tháng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 js-group-type-date">
                                <div class="form-group">
                                    <div class="js-package-type js-package-type-day">
                                        <label class="col-form-label" for="formGroupInputSmall">Số ngày</label>
                                        <select class="form-control" name="total_day">
                                            <option value="3">3 ngày</option>
                                            <option value="4">4 ngày</option>
                                            <option value="5">5 ngày</option>
                                            <option value="6">6 ngày</option>
                                            <option value="7">7 ngày</option>
                                            <option value="8">8 ngày</option>
                                            <option value="9">9 ngày</option>
                                            <option value="10">10 ngày</option>
                                            <option value="11">11 ngày</option>
                                            <option value="12">12 ngày</option>
                                            <option value="13">13 ngày</option>
                                            <option value="14">14 ngày</option>
                                            <option value="15">15 ngày</option>
                                            <option value="16">16 ngày</option>
                                            <option value="17">17 ngày</option>
                                            <option value="18">18 ngày</option>
                                            <option value="19">19 ngày</option>
                                            <option value="20">20 ngày</option>
                                            <option value="21">21 ngày</option>
                                            <option value="22">22 ngày</option>
                                            <option value="23">23 ngày</option>
                                            <option value="24">24 ngày</option>
                                            <option value="25">25 ngày</option>
                                            <option value="26">26 ngày</option>
                                            <option value="27">27 ngày</option>
                                            <option value="28">28 ngày</option>
                                            <option value="29">29 ngày</option>
                                            <option value="30">30 ngày</option>
                                            <option value="31">31 ngày</option>
                                            <option value="32">32 ngày</option>
                                            <option value="33">33 ngày</option>
                                            <option value="34">34 ngày</option>
                                            <option value="35">35 ngày</option>
                                            <option value="36">36 ngày</option>
                                            <option value="37">37 ngày</option>
                                            <option value="38">38 ngày</option>
                                            <option value="39">39 ngày</option>
                                            <option value="40">40 ngày</option>
                                            <option value="41">41 ngày</option>
                                            <option value="42">42 ngày</option>
                                            <option value="43">43 ngày</option>
                                            <option value="44">44 ngày</option>
                                            <option value="45">45 ngày</option>
                                            <option value="46">46 ngày</option>
                                            <option value="47">47 ngày</option>
                                            <option value="48">48 ngày</option>
                                            <option value="49">49 ngày</option>
                                            <option value="50">50 ngày</option>
                                            <option value="51">51 ngày</option>
                                            <option value="52">52 ngày</option>
                                            <option value="53">53 ngày</option>
                                            <option value="54">54 ngày</option>
                                            <option value="55">55 ngày</option>
                                            <option value="56">56 ngày</option>
                                            <option value="57">57 ngày</option>
                                            <option value="58">58 ngày</option>
                                            <option value="59">59 ngày</option>
                                            <option value="60">60 ngày</option>
                                            <option value="61">61 ngày</option>
                                            <option value="62">62 ngày</option>
                                            <option value="63">63 ngày</option>
                                            <option value="64">64 ngày</option>
                                            <option value="65">65 ngày</option>
                                            <option value="66">66 ngày</option>
                                            <option value="67">67 ngày</option>
                                            <option value="68">68 ngày</option>
                                            <option value="69">69 ngày</option>
                                            <option value="70">70 ngày</option>
                                            <option value="71">71 ngày</option>
                                            <option value="72">72 ngày</option>
                                            <option value="73">73 ngày</option>
                                            <option value="74">74 ngày</option>
                                            <option value="75">75 ngày</option>
                                            <option value="76">76 ngày</option>
                                            <option value="77">77 ngày</option>
                                            <option value="78">78 ngày</option>
                                            <option value="79">79 ngày</option>
                                            <option value="80">80 ngày</option>
                                            <option value="81">81 ngày</option>
                                            <option value="82">82 ngày</option>
                                            <option value="83">83 ngày</option>
                                            <option value="84">84 ngày</option>
                                            <option value="85">85 ngày</option>
                                            <option value="86">86 ngày</option>
                                            <option value="87">87 ngày</option>
                                            <option value="88">88 ngày</option>
                                            <option value="89">89 ngày</option>
                                            <option value="90">90 ngày</option>
                                        </select>
                                    </div>
                                    <div class="js-package-type js-package-type-week hidden">
                                        <label class="col-form-label" for="formGroupInputSmall">Số tuần</label>
                                        <select class="form-control" name="total_week">
                                            <option value="1">1 tuần</option>
                                            <option value="2">2 tuần</option>
                                            <option value="3">3 tuần</option>
                                            <option value="4">4 tuần</option>
                                            <option value="5">5 tuần</option>
                                            <option value="6">6 tuần</option>
                                            <option value="7">7 tuần</option>
                                            <option value="8">8 tuần</option>
                                            <option value="9">9 tuần</option>
                                            <option value="10">10 tuần</option>
                                        </select>
                                    </div>
                                    <div class="form-group js-package-type js-package-type-month hidden">
                                        <label class="col-form-label" for="formGroupInputSmall">Số tháng</label>
                                        <select class="form-control" name="total_month">
                                            <option value="1">1 tháng</option>
                                            <option value="2">2 tháng</option>
                                            <option value="3">3 tháng</option>
                                            <option value="4">4 tháng</option>
                                            <option value="5">5 tháng</option>
                                            <option value="6">6 tháng</option>
                                            <option value="7">7 tháng</option>
                                            <option value="8">8 tháng</option>
                                            <option value="9">9 tháng</option>
                                            <option value="10">10 tháng</option>
                                            <option value="11">11 tháng</option>
                                            <option value="12">12 tháng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title payment">
                            Chọn phương thức thanh toán
                        </div>
                        <div class="form-group payment_method_group">
                            <div class="form-check js-payment-item js-payment-account">
                                <input type="radio" name="payment_method" id="payment_from_account" value="account"
                                       checked="checked" class="form-check-input">
                                <label for="payment_from_account" class="form-check-label">
                                    Trừ tiền trong tài khoản <b>nhatro</b> (Bạn đang có TK Chính: 10.000đ)
                                    <p style="color: red;" class="js-note-outofmoney hidden">Số tiền trong tài khoản
                                        của bạn không đủ để thực hiện thanh toán, vui lòng <a
                                            href="#">nạp thêm</a>
                                        hoặc chọn phương thức khác bên dưới</p>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mb-5 btn-lg btn-block">Hoàn tất & Thanh
                                    toán (<span class="js-package-grand-total">0đ</span>)
                                </button>
                            </div>
                        </div>
                </section>
                <section class="col-lg-4 connectedSortable">
                        <div id="maps" style="width:100%; height:300px; margin-bottom: 30px;"></div>
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
                        <div class="card" style="background-color: #f1f1f1;">
                            <div class="card-body">
                                <h5 class="card-title">Thông tin thanh toán</h5>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Bạn đang có:</td>
                                        <td>10.000đ</td>
                                    </tr>
                                    <tr>
                                        <td>Loại tin:</td>
                                        <td class="js-package-title">Tin miễn phí</td>
                                    </tr>
                                    <tr>
                                        <td>Gói thời gian:</td>
                                        <td class="js-time-type">Đăng theo ngày</td>
                                    </tr>
                                    <tr>
                                        <td>Đơn giá:</td>
                                        <td class="js-package-price">0/ngày</td>
                                    </tr>
                                    <tr class="js-use-label hidden">
                                        <td>Gắn nhãn:</td>
                                        <td>2.000 đ/ngày</td>
                                    </tr>
                                    <tr>
                                        <td>Số ngày:</td>
                                        <td class="js-package-days">5</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày hết hạn</td>
                                        <td class="js-package-deadline">13:51, 29/6/2019</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">Thành tiền:</td>
                                        <td><span style="font-size: 30px; font-weight: bold; color: #F90;"
                                                  class="js-package-grand-total">0đ</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </section>
            </div>
            <input type="hidden" id="action" name="action" value="add_new_post"/>
            <input type="hidden" id="map_lat" name="map_lat" value=""/>
            <input type="hidden" id="map_long" name="map_long" value=""/>
        </form>
    </section>
@endsection
