@extends('layouts.profile')
@section('title_profile')
    Đăng tin mới
@endsection

@section('css_profile')

@endsection
@section('js_profile')
    <script src="{{asset('profile/js/ckeditor.js')}}"></script>
    <script src="{{asset('profile/js/profile.js')}}"></script>
@endsection
@section('title_profile')
    Đăng tin mới
@endsection
@section('contents_profile')
    <form id="form_dangtin" class="form-horizontal js-form-submit-data js-frm-manage-post"
          data-action-url="">
        <div class="row">
{{--            Noi dung chinh hien thi ra cac truong can nhap--}}
            <div class="col-md-8">
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
                                    class="form-control js-select-tinhthanhpho" required
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
                                    class="form-control js-select-quanhuyen" required
                                    data-msg-required="Chưa chọn Quận/Huyện">
                                <option value="">chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label" for="phuongxa">Phường/Xã</label>
                            <select class="form-control js-select-phuongxa" name="ward" id="ward">
                                <option value="">chọn phường xã</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label" for="duong">Đường/Phố</label>
                            <select class="form-control js-select-duong" name="street" id="street">
                                <option value="">Chọn đường phố</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street_number" class="col-form-label">Số nhà</label>
                            <input type="text" class="form-control js-input-street-number"
                                   name="street_number" id="street_number" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="diachi" class="col-form-label">Địa chỉ chính xác</label>
                            <input type="text" readonly class="form-control" name="dia_chi" id="diachi"
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
                        <select class="form-control" id="category" name="loai_chuyen_muc" required
                                data-msg-required="Chưa chọn loại chuyên mục">
                            <option value="">-- Chọn loại tin --</option>
                            @foreach($categories as  $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_title" class="col-md-12 col-form-label">Tiêu đề</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tieu_de" id="post_title" value=""
                               minlength="30" maxlength="120" required
                               data-msg-required="Tiêu đề không được để trống"
                               data-msg-minlength="Tiêu đề quá ngắn" data-msg-maxlength="Tiêu đề quá dài">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_content" class="col-md-12 col-form-label">Nội dung mô tả</label>
                    <div class="col-md-12">
                                    <textarea class="form-control" name="noi_dung" id="post_content" rows="12" required
                                              minlength="100" data-msg-required="Bạn chưa nhập nội dung"
                                              data-msg-minlength="Nội dung tối thiểu 100 kí tự"></textarea>
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
                    <label for="giachothue" class="col-md-12 col-form-label">Giá cho thuê</label>
                    <div class="col-md-12">
                        <div class="input-group col-md-6">
                            <input id="giachothue" name="gia" pattern="[0-9.]+" type="text"
                                   class="form-control" required data-msg-required="Bạn chưa nhập giá phòng"
                                   data-msg-min="Giá phòng chưa đúng">
                            <div class="input-group-append">
                                <span class="input-group-text">đồng</span>
                            </div>
                        </div>
                        <small class="form-text text-muted">Nhập đầy đủ số, ví dụ 1 triệu thì nhập là
                            1000000</small>
                        <div class="alert alert-info mb-5" role="alert">
                            <h5>Hơn 50% người xem tin sẽ không liên lạc khi tin đăng không có giá hoặc giá không hợp
                                lý </h5>
                        </div>
                    </div>
                    <label for="text_giachothue" id="text_giachothue"
                           class="col-sm-12 control-label js-number-text" style="color: red;"></label>
                </div>
                <div class="form-group row">
                    <label for="post_acreage" class="col-md-12 col-form-label mb-3">Diện tích</label>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input id="post_acreage" type="number" pattern="[0-9.]+" name="dien_tich"
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
                        <label class="col-md-12 col-form-label left mb-2" for="">Nhà vệ sinh</label>
                        <div class="radio-group row post_cat_group">
                            <label class="radio-inline col-md-4">
                                <input type="radio" name="nha_ve_sinh" id="nha_ve_sinh_option0" class="css-checkbox" value="0" checked="checked"/>
                                <label for="nha_ve_sinh_option0" class="css-label">Chưa xác định</label>
                            </label>
                            <label class="radio-inline col-md-4">
                                <input type="radio" name="nha_ve_sinh" id="nha_ve_sinh_option1" class="css-checkbox" value="0" />
                                <label for="nha_ve_sinh_option1" class="css-label">Vệ sinh khép kín</label>
                            </label>
                            <label class="radio-inline col-md-4">
                                <input type="radio" name="nha_ve_sinh" id="nha_ve_sinh_option2" class="css-checkbox" value="0" />
                                <label for="nha_ve_sinh_option2" class="css-label">Vệ sinh chung</label>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="post_cat" class="col-md-12 col-form-label">Giờ đóng cửa</label>
                        <div class="col-md-6">
                            <select class="form-control" id="acc_time_close" name="acc_time_close" required
                                    data-msg-required="Chưa chọn loại chuyên mục">
                                <option value="">-- Không quy định --</option>
                                <option value=""> Sau 22h30 </option>
                                <option value=""> Sau 23h </option>
                                <option value=""> Sau 23h30 </option>
                                <option value=""> Sau 24h </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <label for="post_acreage" class="col-md-12 col-form-label mb-3">Giá điện</label>
                            <div class="input-group mb-3">
                                <input id="acc_price_water" type="number" pattern="[0-9.]+" name="dien_tich"
                                       max="1000" class="form-control" required
                                       data-msg-required="Bạn chưa nhập giá điện ">
                                <div class="input-group-append">
                                    <select class="form-control" id="acc_time_close" name="acc_time_close" required
                                            data-msg-required="Chưa chọn loại chuyên mục">
                                        <option value="">đồng/Kwh/tháng</option>
                                        <option value="">đồng//tháng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="post_acreage" class="col-md-12 col-form-label mb-3">Giá nước</label>
                            <div class="input-group mb-4">
                                <input id="post_acreage" type="text" pattern="[0-9.]+" name="dien_tich"
                                       max="1000" class="form-control" required
                                       data-msg-required="Bạn chưa nhập g">
                                <div class="input-group-append">
                                    <select class="form-control" id="acc_time_close" name="acc_time_close" required
                                            data-msg-required="Chưa chọn loại chuyên mục">
                                        <option value="">đồng/người/tháng</option>
                                        <option value="">đồng/m<sup>3</sup>/tháng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="giachothue" class="col-md-12 col-form-label">Giá internet</label>
                        <div class="col-md-12">
                            <div class="input-group col-md-6">
                                <input id="giachothue" name="gia" pattern="[0-9.]+" type="text"
                                       class="form-control" required data-msg-required="Bạn chưa nhập giá phòng"
                                       data-msg-min="Giá phòng chưa đúng">
                                <div class="input-group-append">
                                    <span class="input-group-text">đồng</span>
                                </div>
                            </div>
                            <small class="form-text text-muted">Nhập đầy đủ số, ví dụ 1 triệu thì nhập là
                                1000000</small>
                        </div>
                        <label for="text_giachothue" id="text_giachothue"
                               class="col-sm-12 control-label js-number-text" style="color: red;"></label>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="post_cat" class="col-md-12 col-form-label">Yêu cầu đặt cọc</label>
                        <div class="col-md-6">
                            <select class="form-control" id="acc_time_close" name="acc_time_close" required
                                    data-msg-required="Chưa chọn loại chuyên mục">
                                <option value="">Đặt cọc 1 tháng</option>
                                <option value="">Đặt cọc 2 tháng</option>
                                <option value="">Đặt cọc 3 tháng</option>
                                <option value="">Đặt cọc 4 tháng</option>
                                <option value="">Đặt cọc 5 tháng</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group checkbox_group">
                                <label class="col-md-12 col-form-label left mb-2" for="">Giới tính khách thuê:</label>
                                <div class="radio-group row post_cat_group">
                                    <label class="radio-inline col-md-4">
                                        <input type="radio" name="gioi_tinh" id="gioi_tinh_khongquydinh" class="css-checkbox" value="0" checked=&quot;checked&quot;/>
                                        <label for="gioi_tinh_khongquydinh" class="css-label">Không quy định</label>
                                    </label>
                                    <label class="radio-inline col-md-4">
                                        <input type="radio" name="gioi_tinh" id="gioi_tinh_nam" class="css-checkbox" value="1" />
                                        <label for="gioi_tinh_nam" class="css-label">Nam</label>
                                    </label>
                                    <label class="radio-inline col-md-4">
                                        <input type="radio" name="gioi_tinh" id="gioi_tinh_nu" class="css-checkbox" value="2" />
                                        <label for="gioi_tinh_nu" class="css-label">Nữ</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group checkbox_group">
                                <label class="col-md-12 col-form-label left mb-2" for="">Đối tượng khách mà bạn muốn cho thuê:</label>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="nguoi_di_lam" name="nguoi_di_lam" value="1" class="css-checkbox lrg" >
                                            <label for="nguoi_di_lam" class="css-label lrg">Người đi làm</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="ho_gia_dinh" name="ho_gia_dinh" value="1" class="css-checkbox lrg" >
                                            <label for="ho_gia_dinh" class="css-label lrg">Hộ gia đình</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="sinh_vien" name="sinh_vien" value="1" class="css-checkbox lrg" checked=&quot;checked&quot;>
                                            <label for="sinh_vien" class="css-label lrg">Sinh viên</label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-12 col-sm-12">
                            <div class="form-group checkbox_group">
                                <label class="col-md-12 col-form-label left mb-2" for="">Lợi thế phòng trọ, nhà trọ của bạn</label>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="khong_chung_chu" name="khong_chung_chu" value="1" class="css-checkbox lrg" >
                                            <label for="khong_chung_chu" class="css-label lrg">Không chung chủ</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="co_gac" name="co_gac" value="1" class="css-checkbox lrg" >
                                            <label for="co_gac" class="css-label lrg">Có gác</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="co_cua_so" name="co_cua_so" value="1" class="css-checkbox lrg" >
                                            <label for="co_cua_so" class="css-label lrg">Có cửa sổ</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="co_bao_ve" name="co_bao_ve" value="1" class="css-checkbox lrg" >
                                            <label for="co_bao_ve" class="css-label lrg">Có bảo vệ</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="co_camera" name="co_camera" value="1" class="css-checkbox lrg" >
                                            <label for="co_camera" class="css-label lrg">Có camera</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="may_giat" name="may_giat" value="1" class="css-checkbox lrg" >
                                            <label for="may_giat" class="css-label lrg">Có máy giặt</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="dieu_hoa" name="dieu_hoa" value="1" class="css-checkbox lrg" >
                                            <label for="dieu_hoa" class="css-label lrg">Có điều hoà</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="tu_lanh" name="tu_lanh" value="1" class="css-checkbox lrg" >
                                            <label for="tu_lanh" class="css-label lrg">Có tủ lạnh</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="tivi" name="tivi" value="1" class="css-checkbox lrg" >
                                            <label for="tivi" class="css-label lrg">Có Tivi</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="binh_nong_lanh" name="binh_nong_lanh" value="1" class="css-checkbox lrg" >
                                            <label for="binh_nong_lanh" class="css-label lrg">Có máy nước nóng lạnh</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="internet" name="internet" value="1" class="css-checkbox lrg" >
                                            <label for="internet" class="css-label lrg">Có Internet</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="tv_cap" name="tv_cap" value="1" class="css-checkbox lrg" >
                                            <label for="tv_cap" class="css-label lrg">Có truyền hình cáp</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="giuong_ngu" name="giuong_ngu" value="1" class="css-checkbox lrg" >
                                            <label for="giuong_ngu" class="css-label lrg">Có giường ngủ</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="dem" name="dem" value="1" class="css-checkbox lrg" >
                                            <label for="dem" class="css-label lrg">Có đệm</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="bep" name="bep" value="1" class="css-checkbox lrg" >
                                            <label for="bep" class="css-label lrg">Có chỗ nấu ăn</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="ban_lam_viec" name="ban_lam_viec" value="1" class="css-checkbox lrg" >
                                            <label for="ban_lam_viec" class="css-label lrg">Có bàn làm việc</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="tu_quan_ao" name="tu_quan_ao" value="1" class="css-checkbox lrg" >
                                            <label for="tu_quan_ao" class="css-label lrg">Có tủ quần áo</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="san_go" name="san_go" value="1" class="css-checkbox lrg" >
                                            <label for="san_go" class="css-label lrg">Sàn gỗ</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="ban_cong" name="ban_cong" value="1" class="css-checkbox lrg" >
                                            <label for="ban_cong" class="css-label lrg">Có ban công</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="san_phoi" name="san_phoi" value="1" class="css-checkbox lrg" >
                                            <label for="san_phoi" class="css-label lrg">Có sân phơi</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="dich_vu_ve_sinh" name="dich_vu_ve_sinh" value="1" class="css-checkbox lrg" >
                                            <label for="dich_vu_ve_sinh" class="css-label lrg">Dv dọn vệ sinh hàng tuần</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="cho_de_xe" name="cho_de_xe" value="1" class="css-checkbox lrg" >
                                            <label for="cho_de_xe" class="css-label lrg">Có chỗ để xe</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="gym" name="gym" value="1" class="css-checkbox lrg" >
                                            <label for="gym" class="css-label lrg">Phòng Gym</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="cong_vien" name="cong_vien" value="1" class="css-checkbox lrg" >
                                            <label for="cong_vien" class="css-label lrg">Gần công viên</label>
                                        </label>
                                    </div>
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
                            <div for="browse_photos" class="browse_photos js-dropzone">
                                <i data-feather="upload"  style="width: 50px; height: 50px; display: block; margin: 0 auto; pointer-events: none;"></i>
                                <span class="js-btn-chon-anh">Thêm Ảnh</span>
                            </div>
                        </div>
                        <div class="list_photos row dropzone-previews"
                             id="list-photos-dropzone-previews"></div>
                        <div id="tpl" style="display:none">
                            <div class="photo_item col-md-2 col-3 js-photo-manual">
                                <div class="photo"><img data-dz-thumbnail alt="" src=""/></div>
                                <div class="dz-progress"><span class="dz-upload"
                                                               data-dz-uploadprogress></span></div>
                                <div class="bottom clearfix">
                                    <span class="photo_name" data-dz-name></span>
                                    <span class="photo_delete" data-dz-remove><i data-feather="trash-2"></i> Xóa</span>
                                </div>
                                <input name="" value="" type="hidden"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group row mt-5">
                    <div class="col-md-12">
                        <h3>Chọn hình thức đăng tin</h3>
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
{{--                    <div class="form-check js-payment-item js-payment-momo">--}}
{{--                        <input type="radio" name="payment_method" id="payment_from_momo" value="momo"--}}
{{--                               class="form-check-input">--}}
{{--                        <label for="payment_from_momo" class="form-check-label">--}}
{{--                            Thanh toán qua ví điện tử MOMO--}}
{{--                            <span class="bds_icon icon_momo" style="display: block;"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check js-payment-item js-payment-atm">--}}
{{--                        <input type="radio" name="payment_method" id="payment_from_atm" value="atm"--}}
{{--                               class="form-check-input">--}}
{{--                        <label for="payment_from_atm" class="form-check-label">--}}
{{--                            Thanh toán qua thẻ ngân hàng nội địa--}}
{{--                            <span class="bds_icon icon_internet_banking" style="display: block;"></span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check js-payment-item js-payment-visa">--}}
{{--                        <input type="radio" name="payment_method" id="payment_from_credit" value="visa"--}}
{{--                               class="form-check-input">--}}
{{--                        <label for="payment_from_credit" class="form-check-label">--}}
{{--                            Thanh toán qua thẻ quốc tế--}}
{{--                            <div><span class="bds_icon icon_visa"></span><span style="margin: 0 3px;"--}}
{{--                                                                               class="bds_icon icon_mastercard"></span><span--}}
{{--                                    class="bds_icon icon_jcb"></span></div>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check js-payment-item js-payment-bank-transfer mb-2">--}}
{{--                        <input type="radio" name="payment_method" id="payment_from_bank_transfer"--}}
{{--                               value="bank_transfer" class="form-check-input">--}}
{{--                        <label for="payment_from_bank_transfer" class="form-check-label">--}}
{{--                            Chuyển khoản ngân hàng--}}
{{--                            <p class="js-note-transfer-money">Nội dung chuyển khoản: <span--}}
{{--                                    style="color: red;">PT123 THANHTOANTIN <span--}}
{{--                                        class="js-package-title-ck">-</span> <span--}}
{{--                                        class="js-time-type-ck">-</span>: <span--}}
{{--                                        class="js-time-type-so-luong">-</span></span></p>--}}
{{--                            <p>Số tiền chuyển khoản: <span style="color: red;"--}}
{{--                                                           class="js-package-grand-total"></span></p>--}}
{{--                        </label>--}}
{{--                    </div>--}}
                </div>
                <div class="form-group row mt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success mb-5 btn-lg btn-block">Hoàn tất & Thanh
                            toán (<span class="js-package-grand-total">0đ</span>)
                        </button>
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
            </div>




{{--            Noi dung hien thi phan huong dan--}}
            <div class="col-md-4">
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
            </div>

        </div>
        <input type="hidden" id="action" name="action" value="add_new_post"/>
        <input type="hidden" id="map_lat" name="map_lat" value=""/>
        <input type="hidden" id="map_long" name="map_long" value=""/>
    </form>

@endsection
