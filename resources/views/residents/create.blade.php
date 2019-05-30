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
                            <input type="text" class="form-control" placeholder="Tên cư dân" name="name" id="name" value="{{old('name')}}"> 
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('dob') ? 'has-danger' : ''}}">
                            <label for="dob" class="col-form-label">Ngày sinh:</label>
                            <div class='input-group date datepicker' id='datepicker-popup'>
                                <input type="text" class="form-control" placeholder="Ngày sinh" name="dob" id="dob" value="{{old('dob')}}"> 
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>

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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tòa nhà</label>
                                    <div class="col-sm-9">
                                        <select id="building_id" name="building_id"class="form-control">
                                                <option selected value="0">Chọn tòa nhà</option>
                                            @foreach($buildings as $building)
                                                <option value="{{$building->id}}">Tòa {{$building->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tầng</label>
                                    <div class="col-sm-9">
                                        <select name="floor" class="form-control">
                                            <option selected value="">Chọn Tâng</option>
                                            @for($i = 1; $i<11 ; $i++)
                                                <option value={{$i}}>Tầng {{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Căn hộ</label>
                                    <div class="col-sm-9">
                                        <select name="apartment_id" class="form-control">
                                            <option selected value=''>Chọn Căn hộ</option>
                                        </select>
                                    </div>
                                </div>
                            @if ($errors->has('apartment_id'))
                                <small class="text-danger">{{ $errors->first('apartment_id') }}</small>
                            @endif
                            </div>

                        
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


@push('js') 
    <script>
        $(document).ready(function() {
            $('#building_id').change(function(event) {
                floor = $('select[name="floor"]').val();
                building_id = $('#building_id').val()
                if(building_id != 0 && floor != 0){
                    $.ajax({
                        url: '/ajaxGetApartment',
                        type: 'GET',
                        dataType: 'json',
                        data: {'building_id': building_id,'floor' : floor},
                    })
                    .done(function(response) {
                        obj = response.data
                        if(response.status == 200){
                            $('select[name="apartment_id"]').empty();
                            html = "<option selected value='0'>Chọn Căn hộ</option>"
                            Object.keys(obj).forEach(function(key) {
                                html += "<option value='"+key+"'>"+ obj[key]+"</option>"
                            });
                            
                            $('select[name="apartment_id"]').append(html)
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                    
                }
            });

            $('select[name="floor"]').change(function(event) {
                floor = $('select[name="floor"]').val();
                building_id = $('#building_id').val()
                if(building_id != 0 && floor != 0){
                    $.ajax({
                        url: '/admin/ajaxGetApartment',
                        type: 'GET',
                        dataType: 'json',
                        data: {'building_id': building_id,'floor' : floor},
                    })
                    .done(function(response) {
                        obj = response.data
                        if(response.status == 200){
                            $('select[name="apartment_id"]').empty();
                            html = "<option selected value=''>Chọn Căn hộ</option>"
                            Object.keys(obj).forEach(function(key) {
                                html += "<option value='"+key+"'>"+ obj[key]+"</option>"
                            });
                            
                            $('select[name="apartment_id"]').append(html)
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                    
                }
            });
        });
        
    </script>
    <script src="{{asset('assets/js/shared/formpickers.js')}}"></script>
@endpush
