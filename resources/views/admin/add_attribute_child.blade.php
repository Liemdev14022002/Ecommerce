@extends('admin.layout.template')

@section('title')
<title>Thêm Thuộc Tính Con</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trang Chủ /</span> Thêm Thuộc Tính Con</h4>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Thêm Thuộc Tính Con Cho: {{ $attribute->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.store_attribute_child') }}" method="POST">
                @csrf
                <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="value">Tên Thuộc Tính Con</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="value" name="value" placeholder="Nhập tên thuộc tính con">
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Danh Sách Thuộc Tính Con</h5>
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
                        <th>Tên Thuộc Tính Con</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($attributeChildren as $child)
                    <tr>
                        <td>{{ $child->id }}</td>
                        <td>{{ $child->value }}</td>
                    </tr>
                    @endforeach      
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
