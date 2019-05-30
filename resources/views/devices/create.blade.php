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
                        <div class='input-group date datepicker' id='datepicker-popup'>
                            <input type="text" class="form-control" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', now()->format('Y-m-d'))}}"> 
                            <span class="input-group-addon input-group-append border-left">
                                <span class="mdi mdi-calendar input-group-text"></span>
                            </span>
                        </div>
                        @if ($errors->has('purchase_date'))
                            <small class="text-danger">{{ $errors->first('purchase_date') }}</small>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tòa nhà</label>
                                <div class="col-sm-9">
                                    <select id="building_id" name="building_id"class="form-control">
                                            <option selected value="">Chọn tòa nhà</option>
                                        @foreach($buildings as $building)
                                            <option value="{{$building->id}}">Tòa{{$building->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('building_id'))
                                        <small class="text-danger">{{ $errors->first('building_id') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row {{ $errors->has('floor') ? 'has-danger' : ''}}">
                                <label for="floor" class=" col-sm-3 col-form-label">Tầng:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="floor" placeholder="Tầng" id="floor" value="{{old('floor')}}"> 
                                    @if ($errors->has('floor'))
                                        <small class="text-danger">{{ $errors->first('floor') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="{{route('devices.index')}}" class="btn btn-danger" >Quay lại</a>
                </form> 
		        </div>
		    </div>
		</div>
	</div>
@endsection

@push('js')
    <script src="{{asset('assets/js/shared/formpickers.js')}}"></script>
@endpush