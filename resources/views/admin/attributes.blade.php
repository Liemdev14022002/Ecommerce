@extends('admin.layout.template')

@section('title')
<title>Quản Lí Thuộc Tính Sản Phẩm</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Trang Quản Lí Thuộc Tính Sản Phẩm</h5>
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
                    <th>Tên Thuộc Tính</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($attributes as $attribute)
                <tr>
                    <td>{{ $attribute->id }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>
                        <a href="{{route('admin.edit_attributes',$attribute->id)}}" class="btn btn-primary">Sửa</a>
                        <a href="{{ route('admin.add_attribute_child', $attribute->id) }}" class="btn btn-primary">Thêm thuộc tính con</a>
                        <a href="{{route('admin.delete_attributes',$attribute->id)}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach      
            </tbody>
        </table>
    </div>
</div>
@endsection
