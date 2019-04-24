@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::open(['route' => ['users.store'] ]) !!}
                                @include('users._form')
                                @csrf
                                 <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                                    <label for="name" class="col-form-label">Tên nhân viên:</label>
                                    <input type="text" class="form-control" placeholder="Tên nhân viên" name="name" id="name" value="{{old('name')}}"> 
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
                                <div class="form-group {{ $errors->has('gender') ? 'has-danger' : ''}}">
                                    <label for="gender" class="col-form-label">Giới tính:</label>
                                    <select name="gender" class="form-control border-primary">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('phone') ? 'has-danger' : ''}}">
                                    <label for="phone" class="col-form-label">Số điện thoại:</label>
                                    <input type="text" class="form-control" placeholder="số điện thoại" name="phone" id="phone" value="{{old('phone')}}"> 
                                    @if ($errors->has('phone'))
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('address') ? 'has-danger' : ''}}">
                                    <label for="address" class="col-form-label">Địa chỉ:</label>
                                    <input type="text" class="form-control" placeholder="Email" name="address" id="address" value="{{old('address')}}"> 
                                    @if ($errors->has('address'))
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('position') ? 'has-danger' : ''}}">
                                    <label for="position" class="col-form-label">vị trí:</label>
                                    <select name="position" class="form-control border-primary">
                                        @foreach(POSITION as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Submit Form Button -->
                                {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}
                                <a href="{{route('users.index')}}" class="btn btn-danger" >Quay lại</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection