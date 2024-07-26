@extends('admin.layout.template')

@section('title')
<title>Quản Lí Sản Phẩm</title>
@endsection

@section('content')
<div class="card">
                <h5 class="card-header">Trang Quản Lí Sản Phẩm</h5>

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
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Hành Động</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>
                            <img style="height: 100px;" src="{{asset($product->product_img)}}" alt=""></br></br>
                            <a href="{{route('editproductimg',$product->id)}}" class="btn btn-primary">Sửa Ảnh</a>
                        </td>
                        <td>{{ number_format($product->product_price, 0, ',', '.') }} ₫</td>
                        <td>
                            <a href="{{route('edit_product',$product->id)}}" class="btn btn-primary">Sửa</a>
                            <a href="{{route('delete_product',$product->id)}}" class="btn btn-danger">Xóa</a>
                        </td>
                      </tr>
                      @endforeach     
                    </tbody>
                  </table>
                </div>
              </div>
@endsection