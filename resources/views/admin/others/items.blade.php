@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Các tiện ích</h2>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover datatable" id="table">
          <thead>
            <tr>
              <th width="10">
                STT
              </th>
              <th>
                Tiện ích
              </th>

            </tr>
          </thead>

        </table>
    </div>
  </div>
  @endsection