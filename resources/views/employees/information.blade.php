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
					                            <a class="nav-link" id="user-profile-activity-tab" data-toggle="pill" href="#user-profile-activity" role="tab" aria-controls="user-profile-activity" aria-selected="false">Chỉnh sửa thông tin cá nhân</a>
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
					                                                <strong>Địa chỉ :</strong> {{ $user->address == null ? 'Chưa cập nhật địa chỉ' : $user->address }}
					                                            </td>
					                                            <td>
					                                                <strong>Email :</strong> {{$user->email}}
					                                            </td>
					                                        </tr>
					                                        <tr>
					                                            <td>
					                                                <strong>Chức vụ: </strong>{{$user->postion}}
					                                            </td>
					                                            <td>
					                                                <strong>Phone :</strong> {{$user->phone}}
					                                            </td>
					                                        </tr>
					                                    </table>
					                                </div>
					                                <div class="tab-pane fade" id="user-profile-activity" role="tabpanel" aria-labelledby="user-profile-activity-tab">
					                                    <div class="horizontal-timeline">
					                                    	<div class="card-body">
													            <form action="{{route('employees.update',$user->id)}}" method="POST" >
													            	@csrf
											                        @method('PUT')
											                         <div class="form-group {{ $errors->has('name') ? 'has-danger' : ''}}">
											                            <label for="name" class="col-form-label">Tên nhân viên:</label>
											                            <input type="text" class="form-control" placeholder="Tên nhân viên" name="name" id="name" value="{{old('name',$user->name)}}"> 
											                            @if ($errors->has('name'))
											                                <small class="text-danger">{{ $errors->first('name') }}</small>
											                            @endif
											                        </div>
											                        <div class="form-group {{ $errors->has('dob') ? 'has-danger' : ''}}">
											                            <label for="dob" class="col-form-label">Ngày sinh:</label>
											                            <input type="date" class="form-control" placeholder="Ngày sinh" name="dob" id="dob" value="{{old('dob',$user->dob)}}"> 
											                            @if ($errors->has('dob'))
											                                <small class="text-danger">{{ $errors->first('dob') }}</small>
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
											                        <div class="form-group {{ $errors->has('address') ? 'has-danger' : ''}}">
											                            <label for="address" class="col-form-label">Địa chỉ:</label>
											                            <input type="text" class="form-control" placeholder="số điện thoại" name="address" id="address" value="{{old('address',$user->address)}}"> 
											                            @if ($errors->has('address'))
											                                <small class="text-danger">{{ $errors->first('address') }}</small>
											                            @endif
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
	</div>
@endsection