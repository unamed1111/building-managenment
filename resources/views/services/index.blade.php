@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title"> Dịch vụ
		        				@if(auth()->user()->type == 0 || auth()->user()->type == 1  )
			            	<a href="{{route('services.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
			            	@endif
			            </h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('services.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các dịch vụ của tòa nhà </p>
		            @hasanyrole('Admin|Manager')
		            <a href="{{ route('createAllCostService',\Carbon\Carbon::createFromDate()->format('m-y')) }}" class="btn btn-outline-danger">Tạo hóa đơn tháng này</a>
		            @endhasanyrole
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã Dịch Vụ</th>
		                        <th>Tên dịch vụ</th>
		                        <th>Giá (vnđ)</th>
		                        <th>Đơn vị tính</th>
		                        {{-- @can(auth()->user()->type == 1 || auth()->user()->type == 2  ) --}}
		                        <th>Hành động</th>
		                        {{-- @endcan --}}
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($services as $service)
			                    <tr>
			                        <td><a href="{{ route('services.show',$service->id) }}">{{'S00'.$service->id}}</a></td>
			                        <td>{{$service->name}}</td>
			                        <td>{{number_format($service->cost)}}</td>
			                        <td>Tháng</td>
			                        <td>
			                        	{{-- @can(auth()->user()->type == 1 || auth()->user()->type == 2  ) --}}
			                            <a href="{{ route('services.edit',$service->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$service->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $service->id, 'route' => route('services.destroy', $service->id), 'action' => 'delete', 'method' => 'delete'])
	                        			{{-- @endcan --}}
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            {{$services->links()}}
		        </div>
		    </div>
		</div>
	</div>
@endsection