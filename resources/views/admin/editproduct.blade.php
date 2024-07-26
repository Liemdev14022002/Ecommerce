@extends('admin.layout.template')

@section('title')
<title>Sửa thông tin sản phẩm</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Sửa thông tin sản phẩm</h4>
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">sửa sản phẩm</h5>
    </div>
    <div class="card-body">
      <form action="{{route('update_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$productinfor->id}}" name="product_id">
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="nhập tên sản phẩm"
            value="{{$productinfor->product_name}}" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-company">Giá sản phẩm</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="product_price" placeholder="Nhập giá tiền của sản phẩm" name="product_price" 
            value="{{$productinfor->product_price}}"/>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Số Lượng</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="quantity" name="quantity"
            value="{{$productinfor->quantity}}" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả ngắn về sản phẩm</label>
          <div class="col-sm-10">
            <textarea id="product_short_description" name="product_short_description" class="form-control"
            placeholder="Mô tả ngắn về sản phẩm" aria-label="Mô tả ngắn về sản phẩm" 
            aria-describedby="basic-icon-default-message2">{{ $productinfor->product_short_description }}</textarea>            
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả chi tiết về sản phẩm</label>
          <div class="col-sm-10">
            <textarea id="product_long_description" name="product_long_description" 
            class="form-control" placeholder="Mô tả chi tiết về sản phẩm" aria-label="Mô tả chi tiết về sản phẩm" 
            aria-describedby="basic-icon-default-message2">{{ $productinfor->product_long_description }}</textarea>            
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục</label>
          <div class="col-sm-4">
            <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
              <option disabled>Chọn danh mục sản phẩm</option>
              @foreach ($categories as $category)
                         <option value="{{$category->id}}" {{$productinfor->product_category_id == $category->id ? 'selected' : ''}}> {{$category->category_name}} </option>
              @endforeach
            </select>
          </div>
          <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục Phụ</label>
          <div class="col-sm-4">
            <select class="form-select" id="product_subcategory_id" name="product_subcategory_id" aria-label="Default select example">
              <option disabled>Chọn danh mục phụ sản phẩm</option>
              @foreach ($subcategories as $subcategory)
                         <option value="{{$subcategory->id}}" {{$productinfor->product_subcategory_id == $subcategory->id ? 'selected' : ''}}> {{$subcategory->subcategory_name}} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="formFile">Thêm hình ảnh sản phẩm</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" id="product_img" name="product_img"/>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Cập nhật thông tin sản phẩm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
