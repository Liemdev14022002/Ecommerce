@extends('admin.layout.template')

@section('title')
<title>Thêm Danh Mục</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Thêm Danh Mục</h4>
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Thêm mới danh mục</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{route('StoreCategory')}}" method="POST">
                      @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Danh Mục</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="nhập tên danh mục" />
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
</div>
@endsection