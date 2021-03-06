@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('services.update',$service->id)}}" method="POST" >
		            	@csrf
                        @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                        <label for="name" class="col-form-label">Tên dịch vụ:</label>
                        <input type="text" class="form-control" placeholder="Tên dịch vụ" name="name" id="name" value="{{old('name',$service->name)}}"> 
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('cost') ? 'has-danger' : ''}}">
                        <label for="cost" class="col-form-label">Giá dịch vụ:</label>
                        <input type="number" class="form-control" name="cost" placeholder="Giá dịch vụ" id="cost" value="{{old('cost',$service->cost)}}"> 
                        @if ($errors->has('cost'))
                            <small class="text-danger">{{ $errors->first('cost') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('unit') ? 'has-danger' : ''}}">
                        <label for="unit" class="col-form-label">Đơn vị tinh:</label>
                        <select name="unit" class="form-control border-primary">
                            @foreach(SERVICE_UNIT as $key => $value)
                                <option value="{{$key}}" {{$service->unit == $key ? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" {{ $errors->has('description') ? 'has-danger' : ''}}>
                        <label for="description" class="col-form-label">Mô tả:</label> 
                        <textarea class="form-control" placeholder="Thêm mô tả" name="description" id="description">{{old('description',$service->description)}}</textarea> 
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <a href="{{route('services.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection