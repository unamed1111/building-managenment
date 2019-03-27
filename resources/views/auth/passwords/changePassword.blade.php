@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-6 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('postChangePassword')}}" method="POST" >
		            	@csrf
                    <div class="form-group {{ $errors->has('password') ? 'has-danger' : ''}}">
                        <label for="password" class="col-form-label">Mật khẩu hiện tại:</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu hiện tại" name="password" id="password" value="{{old('password')}}"> 
                        @if ($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('new_password') ? 'has-danger' : ''}}">
                        <label for="new_password" class="col-form-label">Mật khẩu mới:</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu mới" name="new_password" id="new_password" value="{{old('new_password')}}"> 
                        @if ($errors->has('new_password'))
                            <small class="text-danger">{{ $errors->first('new_password') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('confirm_new_password') ? 'has-danger' : ''}}">
                        <label for="confirm_new_password" class="col-form-label">Nhập lai mật khẩu mới</label>
                        <input type="password" class="form-control" placeholder="Nhập lai mật khẩu mới" name="confirm_new_password" id="confirm_new_password" value="{{old('confirm_new_password')}}"> 
                        @if ($errors->has('confirm_new_password'))
                            <small class="text-danger">{{ $errors->first('confirm_new_password') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="{{route('home')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection