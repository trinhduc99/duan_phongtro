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
                  <button type="button" class="btn btn-primary" data-id="{{$post->id}}" data-toggle="modal" data-target="#post-modal">
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
                    <input type="radio" id="none" name="gender" value="None" checked>
                    <label for="male">Không bắt buộc</label>
                  </div>
                  <div class="col-lg-4">
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Nam</label>
                  </div>
                  <div class="col-lg-4">
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="male">Nữ</label>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label>Đôi tượng thuê nhà</label>
              <div class="row">
                <div class="col-lg-3">
                  <input type="checkbox" id="none" name="user_object" value="None" checked>
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
                  <option value="m3">Kwh</option>
                  <option value="Personal">Người/tháng</option>
                  <option value="Negotiate">Thương lượng</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Nhầ vệ sinh</label>
              <div class="row">
                <div class="col-lg-6">
                  <input type="radio" id="common" name="toilet" value="Common">
                  <label for="common">Nhà vệ sinh chung</label>
                </div>
                <div class="col-lg-6">
                  <input type="radio" id="private" name="toilet" value="Private">
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


            <div class="form-group">
              @if(count($items) > 0)
                <label for="items">Tiện ích phòng trọ</label>
                <div class="row">
                  @foreach($items as $item)

                  @endforeach
                </div>
                @endif

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
                    $("#province").val(response.provinces);
                    $("#district").val(response.districts);
                    // $('#post-modal').modal('show');
                }
            }
        });
    }
</script>
