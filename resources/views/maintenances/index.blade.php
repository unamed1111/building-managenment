@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Nghiệp vụ
		            	<a href="{{route('maintenances.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các nghiệp vụ của tòa nhà </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã nghiệp vụ</th>
		                        <th>Mô tả nghiệp vụ</th>
		                        <th>Thiết bị</th>
		                        <th>Ngày bắt đầu</th>
		                        <th>Ngày kết thúc</th>
		                        <th>Chi phí</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($maintenances as $maintenance)
			                    <tr>
			                        <td><a href="{{ route('maintenances.show',$maintenance->id) }}">{{'M00'.$maintenance->id}}</a></td>
			                        <td>{{$maintenance->description}}</td>
			                        <td>{{$maintenance->device_id}}</td>
			                        <td>{{$maintenance->time_start}}</td>
			                        <td>{{$maintenance->time_end}}</td>
			                        <td>{{$maintenance->cost}}</td>
			                        <td>
			                            <a href="{{ route('maintenances.edit',$maintenance->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$maintenance->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $maintenance->id, 'route' => route('maintenances.destroy', $maintenance->id)])
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