@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Cư dân
		            	<a href="{{route('employees.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Danh sách nhân viên</p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã nhân viên</th>
		                        <th>Tên nhân viên</th>
		                        <th>Ngày sinh</th>
		                        <th>Vị trí</th>
		                        <th>Giới tính</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($employees as $employee)
			                    <tr>
			                        <td>{{'R00'.$employee->id}}</td>
			                        <td>{{$employee->name}}</td>
			                        <td>{{$employee->dob}}</td>
			                        <td>{{POSITION[$employee->position]}}</td>
			                        <td>{{GENDER[$employee->gender]}}</td>
			                        <td>
			                            <a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$employee->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $employee->id, 'route' => route('employees.destroy', $employee->id)])
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