@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        <h2>Tất cả bài đăng<h2>
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

                  <button type="button" name="get" class="btn btn-link" data-id="{{$post->id}}" onclick="editPost(event.target)">Thao Tác</button>

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
@endsection

<style>

</style>
<script>
    function editPost(event) {
        var id = $(event).data("id");
        let _url = `/post/${id}`;
        $.ajax({
            url: _url,
            type: "GET",
            success: function (response) {
                if (response.code == 200) {
                    alert("Success" + response[0]);
                }
            },
            error: function (response) {
                alert('error' + response.toString());
            }

        })
    }
</script>