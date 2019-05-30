@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('apartments.store')}}" method="POST" >
		            	@csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                        <label for="name" class="col-form-label">Tên căn hộ:</label>
                        <input type="text" class="form-control" placeholder="Tên căn hộ" name="name" id="name" value="{{old('name')}}"> 
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('floor') ? 'has-danger' : ''}}">
                        <label for="floor" class="col-form-label">Tầng:</label>
                        <input type="number" class="form-control" name="floor" placeholder="tầng" id="floor" value="{{old('floor')}}"> 
                        @if ($errors->has('floor'))
                            <small class="text-danger">{{ $errors->first('floor') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('acreage') ? 'has-danger' : ''}}">
                        <label for="acreage" class="col-form-label">Diện tích:</label>
                        <input type="text" class="form-control" name="acreage" placeholder="diện tích" id="acreage" value="{{old('acreage')}}"> 
                        @if ($errors->has('acreage'))
                            <small class="text-danger">{{ $errors->first('acreage') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('owner_name') ? 'has-danger' : ''}}">
                        <label for="owner_name" class="col-form-label">Chủ sở hữu:</label>
                        <input type="text" class="form-control" name="owner_name" placeholder="Chứ sở hữu" id="owner_name" value="{{old('owner_name')}}"> 
                        @if ($errors->has('owner_name'))
                            <small class="text-danger">{{ $errors->first('owner_name') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-danger' : ''}}">
                        <label for="phone" class="col-form-label">số Điện thoại liên hệ:</label>
                        <input type="text" class="form-control" name="phone" placeholder="Chứ sở hữu" id="phone" value="{{old('phone')}}"> 
                        @if ($errors->has('phone'))
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('building_id') ? 'has-danger' : ''}}">
                        <label for="building_id" class="col-form-label">Tòa nhà:</label>
                        <select name="building_id" class="form-control border-primary">
                            @foreach($buildings as $building)
                                <option value="{{$building->id}}">{{$building->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('status') ? 'has-danger' : ''}}">
                        <label for="status" class="col-form-label">Trạng thái:</label>
                        <select name="status" class="form-control border-primary">
                                <option value="1">Đang được sử dụng</option>
                                <option value="0">Chưa được sử dụng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('apartments.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection