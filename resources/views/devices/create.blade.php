@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
		            <form action="{{route('devices.store')}}" method="POST" >
		            	@csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
                        <label for="name" class="col-form-label">Tên thiết bị:</label>
                        <input type="text" class="form-control" placeholder="Tên thiết bi" name="name" id="name" value="{{old('name')}}"> 
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('supplier') ? 'has-danger' : ''}}">
                        <label for="supplier" class="col-form-label">Tên nhà cung cấp:</label>
                        <input type="text" class="form-control" placeholder="Tên nhà cung cấp" name="supplier" id="supplier" value="{{old('supplier')}}"> 
                        @if ($errors->has('supplier'))
                            <small class="text-danger">{{ $errors->first('supplier') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('purchase_date') ? 'has-danger' : ''}}">
                        <label for="purchase_date" class="col-form-label">Ngày mua:</label>
                        <input type="date" class="form-control" name="purchase_date" id="purchase_date" value="{{old('purchase_date')}}"> 
                        @if ($errors->has('purchase_date'))
                            <small class="text-danger">{{ $errors->first('purchase_date') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('floor') ? 'has-danger' : ''}}">
                        <label for="floor" class="col-form-label">Tầng:</label>
                        <input type="number" class="form-control" name="floor" placeholder="Tầng" id="floor" value="{{old('floor')}}"> 
                        @if ($errors->has('floor'))
                            <small class="text-danger">{{ $errors->first('floor') }}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('devices.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection