{{-- @extends('user.layouts.template')

@section('title')
<title>Thông tin tài khoản</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Thông tin tài khoản</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update_inforuser')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ Auth::user()->first_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ Auth::user()->country }}" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ Auth::user()->city }}" required>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ Auth::user()->state }}" required>
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode / ZIP</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ Auth::user()->postcode }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('user.layouts.template')

@section('title')
<title>Thông tin tài khoản</title>
@endsection

@section('content-main')
<div class="container mt-4">
    <div class="row">
        @include('user.layouts.sidebar')

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Thông tin tài khoản</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update_inforuser')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $userData->first_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $userData->last_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $userData->country) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $userData->city) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $userData->state) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="postcode">Postcode / ZIP</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ old('postcode', $userData->postcode) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $userData->phone) }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection