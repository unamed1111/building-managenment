@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		        	<div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title"> Căn hộ 
			            	<a href="{{route('apartments.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
			            </h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('apartments.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin các tòa nhà trong khu vực quản lý </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã căn hộ</th>
		                        <th>Tên căn hộ</th>
		                        <th>Tầng</th>
		                        <th>Diện tích(m2)</th>
		                        <th>Chủ sở hữu</th>
		                        <th>Tòa nhà<	/th>
		                        <th>Trạng thái</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($apartments as $apartment)
			                    <tr>
			                        <td><a href="{{ route('apartments.show',$apartment->id) }}">{{'A00'.$apartment->id}}</a></td>
			                        <td>{{$apartment->name}}</td>
			                        <td>{{$apartment->floor}}</td>
			                        <td>{{$apartment->acreage}}</td>
			                        <td>{{$apartment->owner_name == null ? 'Chưa cập nhật thông tin ' : $apartment->owner_name}}</td>
			                        <td>{{$apartment->building->name}}</td>
			                        <td>{{APARTMENT_STATUS[$apartment->status]}}</td>
			                        <td>
			                            <a href="{{ route('apartments.edit',$apartment->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			@role('Admin|Manager')
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$apartment->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $apartment->id, 'route' => route('apartments.destroy', $apartment->id), 'action' => 'delete', 'method' => 'delete'])
	                        			@endrole
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            {{$apartments->links()}}
		        </div>
		    </div>
		</div>
	</div>
@endsection