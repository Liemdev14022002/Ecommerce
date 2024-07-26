@extends('admin.layout.template')

@section('title')
<title>Quản Lí Danh Mục Phụ</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Trang Quản Lí Danh Mục Phụ</h5>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Id</th>
                        <th>Tên Danh Mục Phụ</th>
                        <th>Danh Mục</th>
                        <th>Sản Phẩm</th>
                        <th>Hành Động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($subcategories as $subcategory)
                                <tr>
                                      <td>{{$subcategory->id}}</td>
                                      <td>{{$subcategory->subcategory_name}}</td>
                                      <td>{{$subcategory->category_name}}</td>
                                      <td>Laptop Dev Acer</td>
                                      <td>
                                          <a href="{{route('editsubcategory', $subcategory->id)}}" class="btn btn-primary">Sửa</a>
                                          <a href="{{route('deletesubcategory', $subcategory->id)}}" class="btn btn-danger">Xóa</a>
                                      </td>
                                </tr>
                      @endforeach
                    </tbody>
                  </table>
    </div>
</div>
@endsection