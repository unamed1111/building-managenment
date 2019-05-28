@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('employees.update',$employee->id)}}" method="POST" >
		            	@csrf
                        @method('PUT')
                         <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                            <label for="name" class="col-form-label">Tên nhân viên:</label>
                            <input type="text" class="form-control" placeholder="Tên nhân viên" name="name" id="name" value="{{old('name',$employee->name)}}"> 
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('dob') ? 'has-danger' : ''}}">
                            <label for="dob" class="col-form-label">Ngày sinh:</label>
                            <div class='input-group date datepicker' id='datepicker-popup'>
                                <input type="text" class="form-control" placeholder="Ngày sinh" name="dob" id="dob" value="{{old('dob',$employee->dob)}}"> 
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>
                            @if ($errors->has('dob'))
                                <small class="text-danger">{{ $errors->first('dob') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-danger' : ''}}">
                            <label for="gender" class="col-form-label">Giới tính:</label>
                            <select name="gender" class="form-control border-primary">
                                <option value="0" {{$employee->gender == 0 ? 'selected' : ''}}>Nam</option>
                                <option value="1" {{$employee->gender == 1 ? 'selected' : ''}}>Nữ</option>
                            </select>
                        </div>
                         <div class="form-group {{ $errors->has('phone') ? 'has-danger' : ''}}">
                            <label for="phone" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" placeholder="số điện thoại" name="phone" id="phone" value="{{old('phone',$employee->phone)}}"> 
                            @if ($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : ''}}">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email',$employee->email)}}"> 
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-danger' : ''}}">
                            <label for="address" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" placeholder="số điện thoại" name="address" id="address" value="{{old('address',$employee->address)}}"> 
                            @if ($errors->has('address'))
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('position') ? 'has-danger' : ''}}">
                            <label for="position" class="col-form-label">Vị trí:</label>
                            <select name="position" class="form-control border-primary">
                                @foreach(POSITION as $key => $value)
                                    <option value="{{$key}}" {{$employee->position == $key ? "selected" : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="{{route('employees.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection

@push('js')
    <script src="{{asset('assets/js/shared/formpickers.js')}}"></script>
@endpush