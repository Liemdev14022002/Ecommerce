{{-- @extends('admin.layout.template')

@section('title')
<title>Thêm Sản Phẩm</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Thêm sản phẩm</h4>
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Thêm mới sản phẩm</h5>
    </div>
    <div class="card-body">
      <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="nhập tên sản phẩm" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-company">Giá sản phẩm</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="product_price" placeholder="Nhập giá tiền của sản phẩm" name="product_price" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Số Lượng</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="nhập tên sản phẩm" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả ngắn về sản phẩm</label>
          <div class="col-sm-10">
            <textarea id="product_short_description" name="product_short_description" class="form-control" placeholder="Mô tả ngắn về sản phẩm" aria-label="Mô tả ngắn về sản phẩm" aria-describedby="basic-icon-default-message2"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả chi tiết về sản phẩm</label>
          <div class="col-sm-10">
            <textarea id="product_long_description" name="product_long_description" class="form-control" placeholder="Mô tả chi tiết về sản phẩm" aria-label="Mô tả chi tiết về sản phẩm" aria-describedby="basic-icon-default-message2"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục</label>
          <div class="col-sm-4">
            <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
              <option selected>Chọn danh mục sản phẩm</option>
              @foreach ($categories as $category)
                         <option value="{{$category->id}}">{{ $category->category_name }}</option>
              @endforeach
            </select>
          </div>
          <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục Phụ</label>
          <div class="col-sm-4">
            <select class="form-select" id="product_subcategory_id" name="product_subcategory_id" aria-label="Default select example">
              <option selected>Chọn danh mục phụ sản phẩm</option>
              @foreach ($subcategories as $subcategory)
                         <option value="{{ $subcategory->id }}">{{$subcategory->subcategory_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <select class="selectpicker" id="attributes" name="attributes[]" multiple data-live-search="true">
          @foreach ($attributes as $attribute)
            <optgroup label="{{ $attribute->name }}">
              @foreach ($attribute->attributeChildren as $child)
                <option value="{{ $child->id }}">{{ $child->name }}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
        

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="formFile">Thêm hình ảnh sản phẩm</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" id="product_img" name="product_img"/>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Thêm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection --}}

@extends('admin.layout.template')

@section('title')
<title>Thêm Sản Phẩm</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Thêm sản phẩm</h4>
  <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Thêm mới sản phẩm</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên sản phẩm</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nhập tên sản phẩm" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-company">Giá sản phẩm</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Nhập giá tiền của sản phẩm" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-name">Số Lượng</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả ngắn về sản phẩm</label>
          <div class="col-sm-10">
            <textarea id="product_short_description" name="product_short_description" class="form-control" placeholder="Mô tả ngắn về sản phẩm"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Mô tả chi tiết về sản phẩm</label>
          <div class="col-sm-10">
            <textarea id="product_long_description" name="product_long_description" class="form-control" placeholder="Mô tả chi tiết về sản phẩm"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục</label>
          <div class="col-sm-4">
            <select class="form-select" id="product_category_id" name="product_category_id">
              <option selected>Chọn danh mục sản phẩm</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
              @endforeach
            </select>
          </div>
          <label class="col-sm-2 col-form-label" for="basic-default-message">Chọn Danh Mục Phụ</label>
          <div class="col-sm-4">
            <select class="form-select" id="product_subcategory_id" name="product_subcategory_id">
              <option selected>Chọn danh mục phụ sản phẩm</option>
              @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        @foreach ($attributes as $attribute)
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="attribute_{{ $attribute->id }}">{{ $attribute->name }}</label>
            <div class="col-sm-10">
              <select class="form-select" id="attribute_{{ $attribute->id }}" name="attributes[{{ $attribute->id }}][]" multiple>
                @foreach ($attribute->attributeChildren as $child)
                  <option value="{{ $child->id }}">{{ $child->value }}</option>
                @endforeach
              </select>
            </div>
          </div>
        @endforeach

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="formFile">Thêm hình ảnh sản phẩm</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" id="product_img" name="product_img"/>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Thêm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
