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
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
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
                                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' has-danger' : '' }}" required placeholder="*********">
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
                                        <label class="label"> Nhập lại mật khẩu</label>
                                        <div class="input-group">
                                            <input name="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}" required placeholder="*********">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                                </span>
                                            </div>
                                        </div> 
                                         @if ($errors->has('password_confirmation'))
                                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-btn btn-block">Cập nhật</button>
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