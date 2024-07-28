@extends('layouts.auth')

@section('content')
    <a href="{{route('home')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
        <img src="{{asset('assets/admin/images/logos/dark-logo.svg')}}" width="180" alt="">
    </a>
    <form action="{{route('register')}}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="exampleInputtext1" class="form-label">Tên của bạn</label>
            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputtext1"
                   aria-describedby="textHelp">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Địa chỉ Email</label>
            <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Đăng ký
        </button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Bạn đã có tài khoản ?</p>
            <a class="text-primary fw-bold ms-2" href="{{route('login.show')}}">Đăng nhập</a>
        </div>
    </form>
@endsection
