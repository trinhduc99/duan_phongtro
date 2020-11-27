@extends('pages.home')

  {{--@section('breadcrumb_profile')--}}
      {{--@extends('partials_profile.breadcrumb-page')--}}
      {{--@section('title_level1', 'Quan Ly')--}}
      {{--@section('title_level2', 'Bài đăng')--}}
      {{--@section('title_page', 'Bài đăng của tôi')--}}
  {{--@endsection--}}

@section('contents_profile')

  <h2>Bài đăng của tôi</h2>

  <div class="card">

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

          <tbody class="text-content">
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

                <a class="btn btn-link" href="#" data-id="{{$post->id}}" onclick="getPost(event.target)">Thao Tác</a>

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
        <div class="modal fade" id="post-modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modal</h4>
              </div>
              <div class="modal-body">
                <form name="userForm" class="form-horizontal">
                  <input type="hidden" name="post_id" id="post_id">
                  <div class="form-group">
                    <label for="name" class="col-sm-2">Tên bài viết</label>
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
                    <label for="province"> Quận/Huyện</label>
                    <div>
                      <select id="province" name="province">
                        <option value="">-- Chọn Quận/Huyện --</option>
                        @foreach($districts as $district)
                          <option value="{{ $district->id }}">{{$district->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2">Mô tả</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="4" cols="50">
                        </textarea>
                      <span id="descriptionError" class="alert-message"></span>
                    </div>
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
      </div>
    </div>


  </div>


@endsection

<style>
  .text-content {
    font-size: 15px;
  }
</style>

<script>
  function getPost(event) {
      var id  = $(event).data("id");
      let _url = `/post/${id}`;
      // $('#post-modal').modal('show');
      // $.ajax({
      //     url: _url,
      //     type: "GET",
      //     success: function(response) {
      //         if(response.success === true) {
      //             response = response[0];
      //             $("#post_id").val(response.id);
      //             $("#title").val(response.title);
      //             $("#description").val(response.description);
      //             $('#post-modal').modal('show');
      //         } else {
      //             $('#post-modal').modal('show');
      //         }
      //     }
      // });
  }
</script>

