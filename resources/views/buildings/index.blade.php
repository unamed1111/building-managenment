@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title"> Các tòa nhà  
			            	{{-- @role('Admin|Manager') --}}
			            	@can('add_buildings')
			            	<a href="{{route('buildings.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
			            	@endcan
			            	{{-- @endrole --}}
			            	</h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('buildings.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin các tòa nhà trong khu vực quản lý </p>
		            <div class="table-responsive">
			            <table class="table table-hover">
			                <thead>
			                    <tr>
			                        <th>Tên tòa nhà</th>
			                        <th>Mô tả</th>
			                        <th>Số điện thoại</th>
			                        <th>Hành động</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($buildings as $building)
				                    <tr>
				                        <td>{{$building->name}}</td>
				                        <td>{{$building->description}}</td>
				                        <td>{{$building->phone}}</td>
				                        <td>
				                        	{{-- @role('Admin|Manager') --}}
				                        	@can('edit_buildings')
				                            <a href="{{ route('buildings.edit',$building->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
		                            			<i class="mdi mdi-cloud-download"></i>Sửa
		                        			</a>
		                        			@endcan
		                        			@can('delete_buildings')
		                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$building->id}}" data-whatever="@mdo">Xóa</button>
		                        			@include('partials.modal',['id'=> $building->id,'route' => route('buildings.destroy', $building->id), 'action' => 'delete', 'method' => 'delete'])
		                        			@endcan
		                        			{{-- @endrole --}}
		                        		</td>
				                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			            {{$buildings->links()}}
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection