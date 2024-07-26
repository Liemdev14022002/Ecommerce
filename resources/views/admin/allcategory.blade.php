@extends('admin.layout.template')

@section('title')
<title>Quản Lí Danh Mục</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Trang Quản Lí Danh Mục</h5>
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
                    <th>Tên Danh Mục</th>
                    <th>Danh mục phụ</th>
                    <th>Sản Phẩm</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->subcategory_count	 }}</td>
                    <td>{{ $category->product_count }}</td>
                    <td>
                        <a href="{{route('editcategory',$category->id)}}" class="btn btn-primary">Sửa</a>
                        <a href="{{route('deletecategory',$category->id)}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach      
            </tbody>
        </table>
    </div>
</div>
@endsection
