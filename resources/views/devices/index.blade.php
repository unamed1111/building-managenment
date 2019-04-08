@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Thiết bị
		            	<a href="{{route('devices.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            	@include('partials.search',['route' => route('devices.index')])
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các thiết bị của tòa nhà </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã thiết bị</th>
		                        <th>Tên thiết bị</th>
		                        <th>Nhà cung cấp</th>
		                        <th>Ngày mua</th>
		                        <th>Tầng</th>
		                        <th>Trạng thái</th>
		                        <th>Thời gian bảo trì gần nhất</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($devices as $device)
			                    <tr>
			                        <td><a href="{{ route('devices.show',$device->id) }}">{{'D00'.$device->id}}</a></td>
			                        <td>{{$device->name}}</td>
			                        <td>{{$device->supplier}}</td>
			                        <td>{{$device->purchase_date}}</td>
			                        <td>{{$device->floor}}</td>
			                        <td>{{deviceStatus($device->status)}}</td>
			                        <td>{{$device->time_maintenance_period}}</td>
			                        <td>
			                            <a href="{{ route('devices.edit',$device->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$device->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $device->id, 'route' => route('devices.destroy', $device->id), 'action' => 'delete', 'method' => 'delete'])
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
@endsection