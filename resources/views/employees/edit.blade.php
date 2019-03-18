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
                            <input type="text" class="form-control" placeholder="Tên tòa nhà" name="name" id="name" value="{{old('name',$employee->name)}}"> 
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('dob') ? 'has-danger' : ''}}">
                            <label for="dob" class="col-form-label">Ngày sinh:</label>
                            <input type="date" class="form-control" placeholder="Ngày sinh" name="dob" id="dob" value="{{old('dob',$employee->dob)}}"> 
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

