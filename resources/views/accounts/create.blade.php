@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('accounts.store')}}" method="POST" >
		            	@csrf
                    <div class="form-group {{ $errors->has('email') ? 'has-danger' : ''}}">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" placeholder="Tên căn hộ" name="email" id="email" value="{{old('email')}}"> 
                        @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-danger' : ''}}">
                        <label for="password" class="col-form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" id="password" value="{{old('password')}}"> 
                        @if ($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('type') ? 'has-danger' : ''}}">
                        <label for="type" class="col-form-label">Loại tài khoản:</label>
                        <select name="type" class="form-control border-primary">
                            @foreach(ACCOUNT_TYPE as $index => $value)
                                <option value="{{$index}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('accounts.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection