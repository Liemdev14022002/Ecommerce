@extends('admin.layout.template')

@section('title')
<title>Thêm hình ảnh và video Sản Phẩm</title>
@endsection

@section('content')
<h1>Trang thêm hình ảnh và video của sản phẩm</h1>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Thêm hình ảnh và video sản phẩm</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('storeimagesproducts') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
          <label for="product_id" class="col-sm-2 col-form-label">Chọn Sản Phẩm Cần Thêm Ảnh và Video</label>
          <div class="col-sm-10">
            <select class="form-select" id="product_id" name="product_id" aria-label="Default select example">
              <option selected>Chọn sản phẩm</option>
              @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="product_images" class="col-sm-2 col-form-label">Thêm hình ảnh sản phẩm</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" id="product_images" name="product_images[]" multiple />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="product_videos" class="col-sm-2 col-form-label">Thêm video sản phẩm</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" id="product_videos" name="product_videos[]" multiple />
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Thêm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
