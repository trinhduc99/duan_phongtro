@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Quản lý người dùng</h2>
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
              Mã
            </th>
            <th width="300">
              Tên
            </th>
            <th width="120">
              Email
            </th>
            <th>
              Số điện thoại
            </th>
            <th width="170">
              Giới tính
            </th>
            <th width="170">
              Số tiền
            </th>
            <th width="100">
              Trạng thái
            </th>
          </tr>
          </thead>

          <tbody>
            @foreach($users as $user)
              <tr>
                <td>
                  {{ $loop->index + 1 }}
                </td>
                <td>
                  {{ $user->id }}
                </td>
                <td>
                  {{ $user->name }}
                </td>
                <td>
                  {{ $user->email }}
                </td>
                <td>
                  {{ $user->phone }}
                </td>
                <td>
                  {{ $user->gender ?? "None" }}
                </td>
                <td>
                  {{ $user->amount }}
                </td>
                <td>
                  {{ $user->status ?? "None" }}
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

</script>