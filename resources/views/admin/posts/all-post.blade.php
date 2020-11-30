@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        <h2>Tất cả bài đăng</h2>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover datatable" id="table">
            <thead>
              <tr>
                <th width="10">
                  STT
                </th>
                <th width="110">
                  Mã bài đăng
                </th>
                <th width="300">
                  Tên bài đăng
                </th>
                <th width="120">
                  Giá bài đăng
                </th>
                <th>
                  Trạng thái
                </th>
                <th width="170">
                  Ngày bắt đầu
                </th>
                <th width="170">
                  Ngày kết thúc
                </th>
                <th width="100">
                  Ghi chú
                </th>
              </tr>
            </thead>

          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>
                {{ $loop->index + 1 }}
              </td>
              <td>
                {{ $post->id ?? '' }}
              </td>
              <td>
                {{ $post->title ?? '' }}
              </td>
              <td>
                {{ $post->post_price ?? '' }}
              </td>
              <td>
                @if ($post->status == 'Pending')
                  <button type="button"  name="pending" class="btn btn-info" data-id="{{$post->id}}">Chờ duyệt</button>
                @endif
                @if ($post->status == 'Approved')
                    <button type="button" name="approved" class="btn btn-success" data-id="{{$post->id}}">Đã duyệt</button>
                  @endif
                  @if ($post->status == 'Denied')
                    <button type="button" name="denied" class="btn btn-danger" data-id="{{$post->id}}">Từ chối</button>
                  @endif
                  @if ($post->status == 'Violate')
                    <button type="button" name="violate" class="btn btn-warning" data-id="{{$post->id}}">Vi phạm</button>
                  @endif
                  <button type="button" class="btn btn-primary" data-id="{{$post->id}}" data-toggle="modal" data-target="#post-modal" onclick="getPost(event.target)">
                    Thao Tác
                  </button>


              </td>
              <td>
                {{ $post->start_date ?? ''}}
              </td>
              <td>
                {{ $post->finish_date ?? ''}}
              </td>
              <td>
                {{ $post->note ?? '' }}
              </td>
            </tr>
            @endforeach
          </tbody>


        </table>
      </div>
    </div>

  </div>

  <div class="modal fade" id="post-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="userForm" class="form-horizontal">
            <input type="hidden" name="post_id" id="post_id">
            <div class="form-group">
              <label for="name" class="col-sm-10">Tên bài viết</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                <span id="titleError" class="alert-message"></span>
              </div>
            </div>
            <div>
              <label for="province"> Tỉnh/Thành phố</label>
              <div>
                <select id="province" name="province">
                  <option value="">-- Chọn Tỉnh/TP --</option>
                  @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{$province->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div>
              <label for="district"> Quận/Huyện</label>
              <div>
                <select id="district" name="district">
                  <option value="">-- Chọn Quận/Huyện --</option>
                  @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div>
              <label for="ward"> Phường xã</label>
              <div>
                <select id="ward" name="ward">
                  <option value=""> --- Chọn phường xã --- </option>
                  @foreach ($wards as $ward)
                    <option value=" {{ $ward->id }}"> {{$ward->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="home-number"> Số nhà</label>
              <div>
                <input type="text" id="home-number" name="home-number">
              </div>
            </div>

            <div class="form-group">
              <label for="address">Địa chỉ </label>
              <div>
                <input type="text" id="address" name="address" value="">
              </div>
            </div>

            <div class="form-group">
              <h2>Thông tin chi tiết</h2>
            </div>
            <div class="form-group">
              <label class="col-sm-10">Mô tả</label>
              <div class="col-sm-12">
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="4" cols="50">
                        </textarea>
                <span id="descriptionError" class="alert-message"></span>
              </div>
            </div>
            <div class="form-group">
              <label for="phone">Liên hệ</label>
              <div class="col-lg-6">
                  <input type="number" id="phone" name="phone" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="price">Giá cho thuê</label>
              <div class="col-lg-8">
                  <input type="number" id="price" name="price" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="area">Diện tích</label>
              <div class="col-lg-6">
                <input type="number" id="area" name="area">
              </div>
            </div>

            <div class="form-group">
                <label>Giới tính người thuê</label>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="radio" id="none" name="gender" value="None" class="Gender-None">
                    <label for="none">Không bắt buộc</label>
                  </div>
                  <div class="col-lg-4">
                    <input type="radio" id="male" name="gender" value="Male" class="Gender-Male">
                    <label for="male">Nam</label>
                  </div>
                  <div class="col-lg-4">
                    <input type="radio" id="female" name="gender" value="Female" class="Gender-Female">
                    <label for="female">Nữ</label>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label>Đôi tượng thuê nhà</label>
              <div class="row">
                <div class="col-lg-3">
                  <input type="checkbox" id="none" name="user_object" value="None">
                  <label for="none">Mọi đối tượng</label>
                </div>
                <div class="col-lg-3">
                  <input type="checkbox" id="student" name="user_object" value="Student">
                  <label for="student">Học sinh/sinh viên</label>
                </div>
                <div class="col-lg-3">
                  <input type="checkbox" id="worker" name="user_object" value="Worker">
                  <label for="worker">Người đi làm</label>
                </div>
                <div class="col-lg-3">
                  <input type="checkbox" id="family" name="user_object" value="Family">
                  <label for="family">Hộ gia đình</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="electric_price">Giá điện</label>
              <div class="col-lg-6 ">
                <input type="number" id="electric_price" name="electric_price">
              </div>
            </div>
            <div>
              <label for="electric_calculate_method">Cách tính giá điện</label>
              <div>
                <select id="electric_calculate_method" name="electric_calculate_method">
                  <option value="Kwh">Kwh</option>
                  <option value="Personal">Người/tháng</option>
                  <option value="Negotiate">Thương lượng</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="water_price">Giá nước</label>
              <div class="col-lg-6 ">
                <input type="number" id="water_price" name="water_price">
              </div>
            </div>
            <div>
              <label for="water_calculate_method">Cách tính giá nước</label>
              <div>
                <select id="water_calculate_method" name="water_calculate_method">
                  <option value="m3">m3</option>
                  <option value="Personal">Người/tháng</option>
                  <option value="Negotiate">Thương lượng</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Nhầ vệ sinh</label>
              <div class="row">
                <div class="col-lg-6">
                  <input type="radio" id="common" name="is_share_toilet" value="1">
                  <label for="common">Nhà vệ sinh chung</label>
                </div>
                <div class="col-lg-6">
                  <input type="radio" id="private" name="is_share_toilet" value="0">
                  <label for="private">Nhà vệ sinh riêng</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="is_the_same_condominium">Chung chủ</label>
              <div class="row">
                <div class="col-lg-6">
                  <input type="radio" id="is_the_same_condominium" name="is_the_same_condominium" value="1">
                  <label for="is_the_same_condominium">Có</label>
                </div>
                <div class="col-lg-6">
                  <input type="radio" id="not_is_the_same_condominium" name="is_the_same_condominium" value="0">
                  <label for="not_is_the_same_condominium">Không</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="close_time">Giờ đóng cửa</label>
              <div>
                <select name="close_time" id="close_time">
                  <option value="None">Giờ giấc thoải mái</option>
                  <option value="21">21h</option>
                  <option value="22">22h</option>
                  <option value="23">23h</option>
                  <option value="24">24h</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="deposit">Đặt cọc tiền </label>
              <div>
                <select id="deposit" name="deposit">
                  <option value="none">Không cần đặt cọc</option>
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


            <div class="form-group">
              @if(count($items) > 0)
                <label for="items">Tiện ích phòng trọ</label>
                <div class="row">
                  @foreach($items as $item)
                    <div class="col-lg-6">
                      <input type="checkbox" id="{{ $item->key }}" value="{{ $item->key }}">
                      <label for="{{ $item->key }}">{{ $item->name }}</label>
                    </div>
                  @endforeach
                </div>
                @endif
            </div>

            <div class="form-group">
              <label for="note">Ghi chú</label>
              <textarea id="note" name="note"></textarea>
            </div>

            <div class="form-group">
              <label for="is_booked">Trạng thái phòng</label>
              <div class="row">
                <div class="col-lg-3">Chưa thuê</div>
                <label class="switch">
                  <input type="checkbox" name="is_boooked">
                  <span class="slider round"></span>
                </label>
                <div class="col-lg-3">Đã thuê</div>
              </div>
            </div>

            <div class="form-group">
              <label for="in_duration">Hạn bài đăng</label>
              <div class="row">
                <div class="col-lg-3">Hết hạn</div>
                <label class="switch">
                  <input type="checkbox" name="is_boooked">
                  <span class="slider round"></span>
                </label>
                <div class="col-lg-3">Gia hạn</div>
              </div>
            </div>

            <div class="form-group">
              <div>
                <label for="created_at">Ngày tạo bài viết</label><br>
                <input type="datetime-local" id="created_at" name="created_at" width="276" />
              </div><br>
              <div>
                <label for="start_date">Ngày bắt đầu hiển thị</label><br>
                <input type="datetime-local" id="start_date" name="start_date" width="276" />
              </div><br>
              <div>
                <label for="finish_date">Hết ngày hiển thị</label><br>
                <input type="datetime-local" id="finish_date" name="finish_date" width="276" />
              </div>
            </div>

            <div class="form-group">
              <div >Trạng thái bài viết</div>
              <div>TRangj thia</div>

            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
        </div>
      </div>
    </div>
  </div>

  @endsection

<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
<script>


    function getPost(event) {
        var id  = $(event).data("id");
        let _url = `/post/${id}`;
        $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
                if(response.success === true) {
                    response = response[0];
                    $("#post_id").val(response.id);
                    $("#title").val(response.title);
                    $("#description").val(response.description);
                    $("#province").val(response.province_id);
                    $("#district").val(response.district_id);
                    $("#ward").val(response.ward_id);
                    $("#home-number").val(response.id);
                    $("#address").val(response.address);
                    $("#phone").val(response.phone);
                    $("#price").val(response.price);
                    $("#area").val(response.area);
                    $('#electric_price').val(response.electric_price);
                    let gender = 'input[value="' + response.gender_user + '"]';
                    $(gender).attr("checked", true);
                    $("#electric_calculate_method").val(response.electric_calculate_method);
                    $("#water_price").val(response.water_price);
                    $("#water_calculate_method").val(response.water_calculate_method);
                    let is_share_toilet  = 'input[name="is_share_toilet"][value="' + response.is_share_toilet + '"]';
                    $(is_share_toilet).attr("checked", true);
                    let is_the_same_condominium = 'input[name="is_the_same_condominium"][value="' + response.is_the_same_condominium + '"]';
                    $(is_the_same_condominium).attr('checked', true);
                    let user_objects = response.user_object;
                    let user_object = user_objects;

                    user_object = 'input[name="user_object"][value="' + user_object + '"]';
                    //     $(user_object).attr('checked', true);
                    // for (user_object of user_objects) {
                    //     alert(user_object);
                    //     user_object = 'input[name="user_object"][value="' + user_object + '"]';
                        $(user_object).attr('checked', true);
                    //     alert(user_object);
                    // }




                }

            },


        });
    }
</script>
