@extends('admin.layout.template')

@section('title')
    <title>Thêm Người Dùng</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Thêm Người Dùng</h5>

    <div class="card-body">
        <form action="{{route('admin.store_user')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên Người Dùng</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
            <a href="{{ route('admin.allusers') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection
