@extends('admin.layout.template')

@section('title')
<title>Quản Lí Người Dùng</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Trang Quản Lí Người Dùng</h5>

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
                    <th>Tên Người Dùng</th>
                    <th>Email</th>
                    <th>Ngày Tạo</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->created_at)
                            {{ $user->created_at->format('d-m-Y') }}
                        @else
                            Không xác định
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.edit_user', $user->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('admin.delete_user', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
</div>
@endsection