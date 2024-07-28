@extends('layouts.auth')

@section('content')
    <a href="{{route('home')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
        <img src="{{asset('assets/admin/images/logos/dark-logo.svg')}}" width="180" alt="">
    </a>
    {{--    <p class="text-center">Your Social Campaigns</p>--}}
    <form action="{{route('login')}}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp">
            @error('err')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input class="form-check-input primary" type="checkbox" value=""
                       id="flexCheckChecked" checked>
                <label class="form-check-label text-dark" for="flexCheckChecked">
                    Ghi nhớ tôi
                </label>
            </div>
            <a class="text-primary fw-bold" href="#">Quên mật khẩu ?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Đăng nhập</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Chưa có tài khoản ?</p>
            <a class="text-primary fw-bold ms-2" href="{{route('register.show')}}">Tạo tài khoản</a>
        </div>
    </form>
@endsection
