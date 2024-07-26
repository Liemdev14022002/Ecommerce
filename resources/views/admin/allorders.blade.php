{{-- @extends('admin.layout.template')

@section('title')
<title>Quản Lí Hóa Đơn</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Trang Quản Lí Hóa Đơn</h5>

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
                    <th>Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Tổng Cộng</th>
                    <th>Ngày Đặt</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.view_orders', $order->id) }}" class="btn btn-info">Xem</a>
                        <form action="{{ route('admin.delete_orders', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?')">Xóa</button>
                        </form>
                        <a href="{{ route('admin.print_orders', $order->id) }}" class="btn btn-secondary">In Hóa Đơn</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection --}}
@extends('admin.layout.template')

@section('title')
<title>Quản Lí Hóa Đơn</title>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Trang Quản Lí Hóa Đơn</h5>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <div class="table-responsive text-nowrap">
        <table class="table" id="ordersTable">
            <thead class="table-light">
                <tr>
                    <th>Id</th>
                    <th>Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Tổng Cộng</th>
                    <th>Ngày Đặt</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ordersTableBody">
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.view_orders', $order->id) }}" class="btn btn-info">Xem</a>
                        <form action="{{ route('admin.delete_orders', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?')">Xóa</button>
                        </form>
                        <a href="{{ route('admin.print_orders', $order->id) }}" class="btn btn-secondary">In Hóa Đơn</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchOrders() {
        $.ajax({
            url: "{{ route('admin.fetch_orders') }}",
            type: 'GET',
            success: function(data) {
                var ordersTableBody = $('#ordersTableBody');
                ordersTableBody.empty(); // Clear existing table data

                data.forEach(function(order) {
                    var row = '<tr>' +
                                '<td>' + order.id + '</td>' +
                                '<td>' + order.first_name + ' ' + order.last_name + '</td>' +
                                '<td>' + order.phone + '</td>' +
                                '<td>' + order.total + '</td>' +
                                '<td>' + new Date(order.created_at).toLocaleDateString() + '</td>' +
                                '<td>' +
                                    '<a href="/admin/orders/' + order.id + '" class="btn btn-info">Xem</a> ' +
                                    '<form action="/admin/orders/' + order.id + '" method="POST" style="display:inline;">' +
                                        '@csrf' +
                                        '@method("DELETE")' +
                                        '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn xóa hóa đơn này?\')">Xóa</button>' +
                                    '</form> ' +
                                    '<a href="/admin/orders/' + order.id + '/print" class="btn btn-secondary">In Hóa Đơn</a>' +
                                '</td>' +
                              '</tr>';
                    ordersTableBody.append(row);
                });
            }
        });
    }

    // Gọi hàm fetchOrders mỗi 30 giây
    setInterval(fetchOrders, 30000); // 30,000 milliseconds = 30 seconds
</script>
@endsection
