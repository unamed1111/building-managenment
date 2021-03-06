@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title"> Thiết bị
		        			@can('add_devices')
			            	<a href="{{route('devices.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
			            	@endcan
			            </h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('devices.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các thiết bị của tòa nhà </p>
		            <div class="table-responsive">
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã thiết bị</th>
		                        <th>Tên thiết bị</th>
		                        <th>Nhà cung cấp</th>
		                        <th>Vị trí</th>
		                        <th>Trạng thái</th>
		                        <th>Thời gian bảo trì gần nhất</th>
		                        @role('Admin|Manager')
		                        <th>Hành động</th>
		                        @endrole
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($devices as $device)
			                    <tr>
			                        <td>{{'D00'.$device->id}}</td>
			                        <td>{{$device->name}}</td>
			                        <td>{{$device->supplier}}</td>
			                        <td>{{'Tòa nhà: ' . optional($device->building)->name . ' - Tầng: '. $device->floor}}</td>
			                        <td><span class="badge-{{ $device->status == 0 ? 'primary':'danger'}} badge">{{deviceStatus($device->status)}}</span></td>
			                        <td>{{$device->time_maintenance_period}}</td>
			                        <td>
			                        	@can('edit_devices')
			                            <a href="{{ route('devices.edit',$device->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			@endcan
	                        			@can('delete_devices')
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$device->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $device->id, 'route' => route('devices.destroy', $device->id), 'action' => 'delete', 'method' => 'delete'])
	                        			@endcan
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            {{$devices->links()}}
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection