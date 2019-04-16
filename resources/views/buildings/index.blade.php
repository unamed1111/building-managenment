@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title">Các tòa nhà 
		            	@role('Admin|Manager')
		            	<a href="{{route('buildings.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            	@include('partials.search',['route' => route('buildings.index')])
		            	@endrole
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin các tòa nhà trong khu vực quản lý </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        {{-- <th>Mã tòa nhà</th> --}}
		                        <th>Tên tòa nhà</th>
		                        <th>Mô tả</th>
		                        <th>Số điện thoại</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($buildings as $building)
			                    <tr>
			                        {{-- <td>{{'M00'.$building->id}}</td> --}}
			                        <td>{{$building->name}}</td>
			                        <td>{{$building->description}}</td>
			                        <td>{{$building->phone}}</td>
			                        <td>
			                        	@role('Admin|Manager')
			                            <a href="{{ route('buildings.edit',$building->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$building->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $building->id,'route' => route('buildings.destroy', $building->id), 'action' => 'delete', 'method' => 'delete'])
	                        			@endrole
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
@endsection