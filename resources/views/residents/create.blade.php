@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('residents.store')}}" method="POST" >
		            	@csrf
                         <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                            <label for="name" class="col-form-label">Tên cư dân:</label>
                            <input type="text" class="form-control" placeholder="Tên tòa nhà" name="name" id="name" value="{{old('name')}}"> 
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('dob') ? 'has-danger' : ''}}">
                            <label for="dob" class="col-form-label">Ngày sinh:</label>
                            <input type="date" class="form-control" placeholder="Ngày sinh" name="dob" id="dob" value="{{old('dob')}}"> 
                            @if ($errors->has('dob'))
                                <small class="text-danger">{{ $errors->first('dob') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('passport') ? 'has-danger' : ''}}">
                            <label for="passport" class="col-form-label">Chứng minh thư/hộ chiếu:</label>
                            <input type="text" class="form-control" placeholder="CMT/Hộ chiếu" name="passport" id="passport" value="{{old('passport')}}"> 
                            @if ($errors->has('passport'))
                                <small class="text-danger">{{ $errors->first('passport') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : ''}}">
                            <label for="phone" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" placeholder="số điện thoại" name="phone" id="phone" value="{{old('phone')}}"> 
                            @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : ''}}">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')}}"> 
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('apartment_id') ? 'has-danger' : ''}}">
                            <label for="apartment_id" class="col-form-label">Căn hộ đang ở:</label>
                            <input type="text" class="form-control" placeholder="Căn hộ" name="apartment_id" id="apartment_id" value="{{old('apartment_id')}}"> 
                            @if ($errors->has('apartment_id'))
                                <small class="text-danger">{{ $errors->first('apartment_id') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-danger' : ''}}">
                            <label for="gender" class="col-form-label">Giới tính:</label>
                            <select name="gender" class="form-control border-primary">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('residents.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection

