@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Thông tin cá nhân
		            </h4>
		            <div class="row profile-page">
					    <div class="col-12">
					        <div class="card">
					            <div class="card-body">
					                <div class="profile-body">
					                    <ul class="nav tab-switch" role="tablist">
					                        <li class="nav-item">
					                            <a class="nav-link active" id="user-profile-info-tab" data-toggle="pill" href="#user-profile-info" role="tab" aria-controls="user-profile-info" aria-selected="true">Thông tin cá nhân</a>
					                        </li>
					                        <li class="nav-item">
					                            <a class="nav-link" id="user-profile-activity-tab" data-toggle="pill" href="#user-profile-activity" role="tab" aria-controls="user-profile-activity" aria-selected="false">Lịch sử giao dịch</a>
					                        </li>
					                        <li class="nav-item">
					                            <a class="nav-link" id="user-profile-edit-tab" data-toggle="pill" href="#user-profile-edit" role="tab" aria-controls="user-profile-activity" aria-selected="false">Chỉnh sửa thông tin</a>
					                        </li>
					                    </ul>
					                    <div class="row">
					                        <div class="col-md-9">
					                            <div class="tab-content tab-body" id="profile-log-switch">
					                                <div class="tab-pane fade show active pr-3" id="user-profile-info" role="tabpanel" aria-labelledby="user-profile-info-tab">
					                                    <table class="table table-borderless w-100 mt-4">
					                                        <tr>
					                                            <td>
					                                                <strong>Họ tên:</strong> {{$user->name}}
					                                            </td>
					                                            <td>
					                                                <strong>Ngày sinh :</strong> {{\Carbon\Carbon::parse($user->dob)->format('d-m-Y')}}
					                                            </td>
					                                        </tr>
					                                        <tr>
					                                            <td>
					                                                <strong>Sống tại :</strong> {{ 'Căn'. optional($user->apartment)->name}}
					                                            </td>
					                                            <td>
					                                                <strong>Email :</strong> {{$user->email}}
					                                            </td>
					                                        </tr>
					                                        <tr>
					                                            <td>
					                                                <strong>Tòa nhà: </strong>{{optional($user->apartment->building)->name}}
					                                            </td>
					                                            <td>
					                                                <strong>Phone :</strong> {{$user->phone}}
					                                            </td>
					                                        </tr>
					                                    </table>
					                                    <div class="row mt-5 pb-4 border-bottom">
					                                    </div>
					                                    <div class="row">
					                                        <div class="col-12 mt-5">
					                                            <h5 class="mb-5">Thông báo</h5>
					                                            <div class="stage-wrapper pl-4">
					                                                <div class="stages border-left pl-5 pb-4 text-info">
					                                                    <div class="btn btn-icons btn-rounded stage-badge btn-inverse-success">
					                                                        <i class="mdi mdi-texture"></i>
					                                                    </div>
					                                                    <div class="d-flex align-items-center mb-2 justify-content-between">
					                                                        <h5 class="mb-0">Hạn đóng tiền hàng tháng</h5>
					                                                        <small class="text-muted">Ban quản lý</small>
					                                                    </div>
					                                                    <p>Ngày 25 hàng tháng chúng tôi sẽ bắt đầu thu phí dịch vụ cho tháng trước đó, thời gian đóng là 5 ngày kể từ ngày bắt đầu. Có thế đóng tiền qua hệ thống Paypal hoặc trực tiếp với nhân viên tòa nhà tại khu vực lễ tân. </p>
					                                                </div>
					                                                @if($cost_service_history_unpaid->count() != 0 )
						                                                <div class="stages pl-5 pb-4">
						                                                    <div class="btn btn-icons btn-rounded stage-badge btn-inverse-primary">
						                                                        <i class="mdi mdi-checkbox-marked-circle-outline"></i>
						                                                    </div>
						                                                    <div class="d-flex align-items-center mb-2 justify-content-between">
						                                                        <h5 class="mb-0">Chưa trả phí dịch vụ tháng </h5>
						                                                        <small class="text-muted">Ban quản lý</small>
						                                                    </div>
					                                                      	@foreach($cost_service_history_unpaid as $cost_unpaid)
						                                                      	@php
								                                            		$temp = explode('-',$cost_unpaid->month);
								                                            		$month = '15-'.$temp[0].'-20'.$temp[1];
								                                            	@endphp
						                                                	<p class="text-danger">{{ 'Còn nợ: '. \Carbon\Carbon::parse($month)->format('m-Y'). ' số tiền cần thanh toán ' .number_format($cost_unpaid->amount).' vnd'}}</p>
							                                                @endforeach
				                                            			</div>
					                                                @endif
					                                                @foreach(auth()->user()->notifications()->paginate(10) as $notification)
																		<div class="stages border-left pl-5 pb-4">
						                                                    <div class="btn btn-icons btn-rounded stage-badge btn-inverse-success">
						                                                        <i class="mdi mdi-texture"></i>
						                                                    </div>
						                                                    <div class="d-flex align-items-center mb-2 justify-content-between">
						                                                        <h5 class="mb-0">{{isset($notification->data['noti_name']) ? $notification->data['noti_name'] : 'Thông báo ...' }}</h5>
						                                                        <small class="text-muted">Ban quản lý /hệ thống</small>
						                                                    </div>
						                                                    @if($notification->type == 'App\Notifications\PaymentNotification')
													                        <p>
													                            {{ $notification->data['message'] }} <span class="badge badge-light">{{ PAY_STATUS[$notification->data['status']] }} </span>
													                        </p> 
													                        @elseif($notification->type == 'App\Notifications\RegisterServiceNotification')
													                            <p>
													                            	{{ 'Bạn đã đăng kí dịch vụ: '. $notification->data['name'] . ' - với giá: ' . number_format($notification->data['cost']) .' vnđ'}}
													                            </p>
													                        @elseif($notification->type == 'App\Notifications\DoneReportNotification')
													                            <p>{{ $notification->data['title'] . ' - ' . REPORT_STATUS[$notification->data['status']]}}</h6>
												                            	</p>
													                        @endif
						                                                </div>
					                                                @endforeach
					                                                {{auth()->user()->notifications()->paginate(10)->links()}}
					                                        	</div>
					                                    	</div>
					                                	</div>
					                                </div>
					                                <div class="tab-pane fade" id="user-profile-activity" role="tabpanel" aria-labelledby="user-profile-activity-tab">
					                                    <div class="horizontal-timeline">
					                                    	@forelse($cost_service_history as $cost)
					                                        <section class="time-frame">
					                                            <h4 class="section-time-frame">{{'Lúc '. \Carbon\Carbon::parse($cost->updated_at)->format('H:i d-m-Y')}}</h4>
					                                            <div class="event">
					                                            	@php
					                                            		$temp = explode('-',$cost->month);
					                                            		$month = '15-'.$temp[0].'-20'.$temp[1];
					                                            	@endphp
					                                                <p class="event-text">{{ 'Đã thanh toán phí dịch vụ tháng '. \Carbon\Carbon::parse($month)->format('m-Y')}}</p>
					                                                <div class="event-alert"> {{ 'Số tiền đã thanh toán '. number_format($cost->amount).' vnd'}}</div>
					                                                <div class="event-alert"> {{'Hình thức thanh toán: '.  PAY_STATUS[$cost->status]}}</div>
					                                                @if($cost->status == 1)
					                                                <div class="event-info">{{'Nhân viên thanh toán: ' . optional($cost->employee)->name}}</div>
					                                                @endif
					                                            </div>
					                                        </section>
					                                        @empty
															<h4 class="section-time-frame">Chưa có giao dịch lần nào</h4>
					                                        @endforelse
					                                    </div>
					                                </div>
					                                <div class="tab-pane fade" id="user-profile-edit" role="tabpanel" aria-labelledby="user-profile-edit-tab">
					                                    <div class="horizontal-timeline">
					                                    	<form action="{{route('residents.resident-update',$user->id)}}" method="POST" >
												            	@csrf
										                        @method('PUT')
										                         <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
										                            <label for="name" class="col-form-label">Tên cư dân:</label>
										                            <input type="text" class="form-control" placeholder="Tên cư dân" name="name" id="name" value="{{old('name',$user->name)}}"> 
										                            @if ($errors->has('name'))
										                                <small class="text-danger">{{ $errors->first('name') }}</small>
										                            @endif
										                        </div>
										                        <div class="form-group {{ $errors->has('dob') ? 'has-danger' : ''}}">
										                            <label for="dob" class="col-form-label">Ngày sinh:</label>
			                                                        <div class='input-group date datepicker' id='datepicker-popup'>
										                                <input type="text" class="form-control" placeholder="Ngày sinh" name="dob" id="dob" value="{{old('dob',$user->dob)}}"> 
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
										                            <input type="text" class="form-control" placeholder="CMT/Hộ chiếu" name="passport" id="passport" value="{{old('passport',$user->passport)}}"> 
										                            @if ($errors->has('passport'))
										                                <small class="text-danger">{{ $errors->first('passport') }}</small>
										                            @endif
										                        </div>
										                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : ''}}">
										                            <label for="phone" class="col-form-label">Số điện thoại:</label>
										                            <input type="text" class="form-control" placeholder="số điện thoại" name="phone" id="phone" value="{{old('phone',$user->phone)}}"> 
										                            @if ($errors->has('phone'))
										                                <small class="text-danger">{{ $errors->first('phone') }}</small>
										                            @endif
										                        </div>
										                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : ''}}">
										                            <label for="email" class="col-form-label">Email:</label>
										                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email',$user->email)}}"> 
										                            @if ($errors->has('email'))
										                                <small class="text-danger">{{ $errors->first('email') }}</small>
										                            @endif
										                        </div>
										                        <div class="row">
										                            <div class="col-md-4">
										                                <div class="form-group row">
										                                    <label class="col-sm-3 col-form-label">Tòa nhà</label>
										                                    <div class="col-sm-9">
										                                        <select id="building_id" name="building_id"class="form-control">
										                                                <option selected value="0">Chọn tòa nhà</option>
										                                            @foreach($buildings as $building)
										                                                <option {{$user->apartment->building_id == $building->id ? 'selected' : '' }} value="{{$building->id}}">Tòa {{$building->name}}</option>
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
										                                            <option selected value="0">Chọn Tâng</option>
										                                            @for($i = 1; $i<11 ; $i++)
										                                                <option {{$user->apartment->floor == $i ? 'selected' : '' }} value={{$i}}>Tầng {{$i}}</option>
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
										                                            <option selected value='{{$user->apartment_id}}'>{{$user->apartment->name}}</option>
										                                        </select>
										                                    </div>
										                                </div>
										                            </div>
										                        </div>
										                        <div class="form-group {{ $errors->has('gender') ? 'has-danger' : ''}}">
										                            <label for="gender" class="col-form-label">Giới tính:</label>
										                            <select name="gender" class="form-control border-primary">
										                                <option value="0" {{$user->gender == 0 ? 'selected' : ''}}>Nam</option>
										                                <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Nữ</option>
										                            </select>
										                        </div>
										                    <button type="submit" class="btn btn-primary">Sửa</button>
										                </form> 
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
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

            $('select[name="floor"]').change(function(event) {
                floor = $('select[name="floor"]').val();
                building_id = $('#building_id').val()
                if(building_id != 0 && floor != 0){
                    $.ajax({
                        url: 'admin/ajaxGetApartment',
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
        });
        
    </script>
    <script src="{{asset('assets/js/shared/formpickers.js')}}"></script>
@endpush
