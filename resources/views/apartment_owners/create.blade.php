@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-6 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('apartment_owners.store')}}" method="POST" >
		            	@csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                        <label for="name" class="col-form-label">Tên chủ sở hữu :</label>
                        <input type="text" class="form-control" placeholder="Tên chủ sở hữu" name="name" id="name" value="{{old('name')}}"> 
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-danger' : ''}}">
                        <label for="phone" class="col-form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại liên lạc" id="phone" value="{{old('phone')}}"> 
                        @if ($errors->has('phone'))
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
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
                    <a href="{{route('apartment_owners.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection