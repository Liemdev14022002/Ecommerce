<!-- Sidebar -->
<div class="col-lg-3">
    <div class="list-group">
        <a href="{{route('user.dashboard')}}" class="list-group-item list-group-item-action">Bảng điều khiển</a>
        <a href="{{route('user.inforuser')}}" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
        <a href="{{route('user.shopping')}}" class="list-group-item list-group-item-action">Giỏ hàng</a>
        <a href="{{route('user.showorders')}}" class="list-group-item list-group-item-action">Lịch sử mua hàng</a>
        {{-- <a href="" class="list-group-item list-group-item-action">Cài đặt tài khoản</a> --}}
        <a href="{{route('logout')}}" class="list-group-item list-group-item-action">Đăng xuất</a>
    </div>
</div>