@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Dịch vụ
		            	<a href="{{route('services.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các dịch vụ của tòa nhà </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã Dịch Vụ</th>
		                        <th>Tên dịch vụ</th>
		                        <th>Giá</th>
		                        <th>Đơn vị tính</th>
		                        <th>Mô tả</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($services as $service)
			                    <tr>
			                        <td><a href="{{ route('services.show',$service->id) }}">{{'S00'.$service->id}}</a></td>
			                        <td>{{$service->name}}</td>
			                        <td>{{$service->cost}}</td>
			                        <td>{{$service->unit}}</td>
			                        <td>{{$service->description}}</td>
			                        <td>
			                            <a href="{{ route('services.edit',$service->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$service->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $service->id, 'route' => route('services.destroy', $service->id), 'action' => 'delete', 'method' => 'delete'])
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