@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h2 class="card-title"> Tất cả các dịch vụ của tòa nhà
		            </h2>
		            @include('partials.alert')
		            <div class="col-lg-12 grid-margin stretch-card">
					    <div class="card">
					        <div class="card-body">
			                    <h3 class="card-title">Các dịch vụ đang sử dụng</h3>
			                    <div class="row">
						           @foreach($user_services as $user_service)
		  			                    <div class="col-lg-3 col-md-3 col-sm-3 grid-margin stretch-card">
										    <div class="card card-statistics bg-blue-gradient">
										        <div class="card-body">
										            <div class="clearfix">
										                <div class="float-left">
										                    <i class="mdi mdi-cube icon-lg"></i>
										                </div>
										                <div class="float-right">
										                    <p class="mb-0 text-right">{{$user_service->name }}</p>
										                    <div class="fluid-container">
										                        <h5 class="font-weight-medium text-right mb-0">{{'Giá: '.number_format($user_service->cost)." vnđ"}}</h5>
										                        <span class="float-right"> {{"x". $user_service->pivot->qty}}</span>
										                    </div>
										                </div>
										            </div>
										            <p class="mt-3 mb-0">
										                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> <button style="cursor:pointer;" type="button" class="badge badge-info" data-toggle="modal" data-target="#services-user-{{$user_service->id}}">Chi tiết</button> 
										            </p>
										        </div>
										    </div>
										</div>
				                      @include('resident_layout.services.modal_show_service',['service' => $user_service,'user' =>'user'])
						           @endforeach
			                    </div>
					        </div>
					    </div>
					</div>
		            <div class="col-lg-12 grid-margin stretch-card">
					    <div class="card">
					        <div class="card-body">
					        	<h4 class="card-title">Danh sách các dịch vụ</h4>
					        	<div class="table-responsive">
					            <table class="table table-hover">
					                <thead>
					                    <tr>
					                        <th>Mã Dịch Vụ</th>
					                        <th>Tên dịch vụ</th>
					                        <th>Giá (vnđ)</th>
					                        <th>Chi tiết</th>
										 </tr>
					                </thead>
					                <tbody>
					                	@foreach($services as $service)
						                    <tr>
						           			<td>{{'S00'.$service->id}}</td>
					                        <td>{{$service->name}}</td>
					                        <td>{{number_format($service->cost)}}</td>
						                        <td>  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#services-none-{{$service->id}}">Xem</button> 
				                      		</td>
					                      		@include('resident_layout.services.modal_show_service',['service' => $service,'user' =>'none'])
						                    </tr>
					                    @endforeach
					                </tbody>
					            </table>
					            {{$services->links()}}
					            </div>
					        </div>
					    </div>
					</div>
		        </div>
		    </div>
		</div>
	</div>
@endsection