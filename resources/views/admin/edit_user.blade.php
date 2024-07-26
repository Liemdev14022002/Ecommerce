@extends('admin.layout.template')

@section('title')
<title>Sửa Người Dùng</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Sửa Người Dùng</h5>

    <div class="card-body">
        <form action="{{ route('admin.update_user', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Tên Người Dùng</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu (để trống nếu không muốn thay đổi)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.allusers') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection
