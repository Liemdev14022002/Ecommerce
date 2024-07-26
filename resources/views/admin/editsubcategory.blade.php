@extends('admin.layout.template')

@section('title')
<title>Sửa Danh Mục Phụ</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Sửa Danh Mục Phụ</h4>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Sửa danh mục phụ</h5>
        </div>
        <div class="card-body">
            <form action="{{route('updatesubcategory')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$subcategory_info->id}}" name="subcategory_id">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Danh Mục Phụ</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$subcategory_info->subcategory_name}}" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="nhập tên danh mục" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục</label>
                    <div class="col-sm-12">
                        <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                            <option value="" disabled>Mở và chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$subcategory_info->category_id == $category->id ? 'selected' : ''}}> {{$category->category_name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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
</div>
@endsection
