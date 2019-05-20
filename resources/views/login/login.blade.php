<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.header')
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auto-form-wrapper">
                                <form action="{{ route('login')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label">Tài Khoản</label>
                                        <div class="input-group">
                                            <input name="email" type="text" class="form-control {{ $errors->has('email') ? ' has-danger' : '' }}" value="{{ old('email') }}" required autofocus placeholder="Nhập Email của bạn">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Mật khẩu</label>
                                        <div class="input-group">
                                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? 'has-danger' : ''}}" required placeholder="*********">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked> Giữ đăng nhập </label>
                                        </div>
                                        <a href="{{route('password.request')}}" class="text-small forgot-password text-black">Quên mật khẩu?</a>
                                    </div>
                                    <div class="text-block text-center my-3">
                                        <span class="text-small font-weight-semibold">Nêu chưa có tài khoản :</span>
                                        <a href="#" class="text-black text-small">Vui lòng liên hệ với nhân viên, hoặc ban quản lý</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
       @include('layouts.script')
    </body>
</html>