@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title">  Nghiệp vụ
		        			{{-- @if(auth()->user()->type == 0 || auth()->user()->type == 1  ) --}}
		        			@can('add_maintance')
			            	<a href="{{route('maintenances.create')}}" class="btn btn-primary btn-sm btn-rounded">Tạo</a>
			            	@endcan
			            	{{-- @endif --}}
			            </h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('maintenances.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các nghiệp vụ của tòa nhà </p>
		            <div class="table-responsive">
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã nghiệp vụ</th>
		                        <th>Mô tả nghiệp vụ</th>
		                        <th>Thiết bị</th>
		                        <th>Ngày bắt đầu</th>
		                        <th>Ngày kết thúc</th>
		                        <th>Chi phí(VND)</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($maintenances as $maintenance)
			                    <tr>
			                        <td><a href="{{ route('maintenances.show',$maintenance->id) }}">{{'M00'.$maintenance->id}}</a></td>
			                        <td>{{$maintenance->description}}</td>
			                        <td>{{$maintenance->device->name}}</td>
			                        <td>{{\Carbon\Carbon::parse($maintenance->time_start)->format('d-m-Y')}}</td>
			                        <td>{{$maintenance->time_end == null ? 'Vẫn đang bảo trì' : date('Y-m-d', strtotime($maintenance->time_end))}}</td>
			                        <td>{{number_format($maintenance->cost)}}</td>
			                        <td>	
			                        {{-- @if(auth()->user()->type == 0 || auth()->user()->type == 1  ) --}}
	                        			@if(!isset($maintenance->time_end))
	                        			@can('edit_maintance')
		                        			<a href="{{ route('maintenances.edit',$maintenance->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
		                            			<i class="mdi mdi-cloud-download"></i>Sửa
		                        			</a>
		                        		@endcan
		                        		@role('Admin|Manager')
	                        				&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#endMaintenance".$maintenance->id}}" data-whatever="@mdo">Kết thúc bảo trì</button>
	                        			@include('partials.modal',['id'=> $maintenance->id, 'route' => route('maintenances.endMaintenance', $maintenance->id), 'action' => 'endMaintenance', 'method' => 'post'])
	                        			@endrole
	                        			@can('delete_maintance')
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$maintenance->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $maintenance->id, 'route' => route('maintenances.destroy', $maintenance->id), 'action' => 'delete', 'method' => 'delete' ])
	                        			@endcan
	                        			@endif
	                        		{{-- @endif --}}
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            {{$maintenances->links()}}
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection