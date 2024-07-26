@extends('admin.layout.template')

@section('title')
<title>Thêm Thuộc Tính</title>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Thêm Thuộc Tính</h4>
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Thêm mới Thuộc Tính</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{route('admin.store_attributes')}}" method="POST">
                      @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tên Thuộc Tính</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="nhập tên thuộc tính" />
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