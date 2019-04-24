@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Tất cả các dịch vụ của tòa nhà
		            </h4>
		            <div class="col-lg-12 grid-margin stretch-card">
					    <div class="card">
					        <div class="card-body">
			                    <h4 class="card-title">Các dịch vụ đang sử dụng</h4>
			                    <ul class="list-ticked">
						           @foreach($user_services as $user_service)
				                      <li> {{$user_service->name}} => <button type="button" class="badge badge-info" data-toggle="modal" data-target="#services-user-{{$user_service->id}}">Chi tiết</button> </li>
				                      @include('resident_layout.services.modal_show_service',['service' => $user_service,'user' =>'user'])
						           @endforeach
			                    </ul>
					        </div>
					    </div>
					</div>
		            <div class="col-lg-12 grid-margin stretch-card">
					    <div class="card">
					        <div class="card-body">
					        	<h4 class="card-title">Danh sách các dịch vụ</h4>
					            <table class="table table-hover">
					                <thead>
					                    <tr>
					                        <th>Mã Dịch Vụ</th>
					                        <th>Tên dịch vụ</th>
					                        <th>Giá</th>
					                        <th>Chi tiết</th>
										 </tr>
					                </thead>
					                <tbody>
					                	@foreach($services as $service)
						                    <tr>
						           			<td>{{'S00'.$service->id}}</td>
					                        <td>{{$service->name}}</td>
					                        <td>{{$service->cost}}</td>
						                        <td>  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#services-none-{{$service->id}}">Xem</button> 
				                      		</td>
					                      		@include('resident_layout.services.modal_show_service',['service' => $service,'user' =>'none'])
						                    </tr>
					                    @endforeach
					                </tbody>
					            </table>
					        </div>
					            {{$services->links()}}
					    </div>
					</div>
		        </div>
		    </div>
		</div>
	</div>
@endsection