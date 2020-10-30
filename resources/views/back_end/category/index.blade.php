@extends('layouts.back_end')
@section('title_be')
    List danh muc
@endsection
@section('contents_be')
    <div class="content-wrapper">
        @include('partials_be.content_header',['name'=>'Danh sách Danh mục','key'=>''])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-success float-right m-2">
                            Add New <i class="fa fa-user-plus fa-fw"></i>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover datatable datatable-Speaker">
                            <thead>
                            <tr>
                                <th width="10%" class="text-center">
                                    ID
                                </th>
                                <th width="30%" class="text-center">Tên danh mục</th>
                                <th width="20%" class="text-center">Registered at</th>
                                <th width="20%" class="text-center">Updated at</th>
                                <th width="20%" class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td scope="row" class="text-center">{{$category->id}}</td>
                                    <td class="text-center">{{$category->name}}</td>
                                    <td class="text-center">{{$category->created_at}}</td>
                                    <td class="text-center">{{$category->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="#"
                                           class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a style="color: white"
                                           data-url="#"
                                           class="btn btn-danger action_delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

