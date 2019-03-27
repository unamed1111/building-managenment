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
                                <h5 class="text-center">Cập nhật mật khẩu</h5>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                     @csrf
                                    <div class="form-group">
                                        <label class="label">Email: </label>
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
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary submit-btn ">Gửi yêu cầu cấp mật khẩu</button>
                                        <a href="{{route('login')}}" class="btn btn-danger submit-btn">Quay lại</a>
                                    </div>
                                </form>
                            </div>
                            <p class="footer-text text-center">Building Care with <b>Admin</b></p>
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