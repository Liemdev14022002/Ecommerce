@extends('admin.layout.template')

@section('title')
<title>Sửa Ảnh Sản Phẩm</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Sửa ảnh sản phẩm</h4>
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Sửa ảnh sản phẩm mới</h5>
    </div>
    <div class="card-body">
      <form action="{{route('update_product_img')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$productimg->id}}">
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="formFile">Hình ảnh sản phẩm</label>
          <div class="col-sm-10">
            <img style="height: 200px;" src="{{asset($productimg->product_img)}}" alt="">
          </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="formFile">Cập nhật hình ảnh sản phẩm mới</label>
            <div class="col-sm-10">
              <input class="form-control" type="file" id="product_img" name="product_img"/>
            </div>
          </div>

        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
