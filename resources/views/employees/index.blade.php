@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Quản lý nhân viên
		            	@role('Admin|Manager')
		            	<a href="{{route('employees.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            	@endrole
		            	@include('partials.search',['route' => route('employees.index')])
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
		                        <th>Số điện thoại</th>
		                        @role('Admin|Manager')
		                        <th>Hành động</th>
		                        @endrole
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($employees as $employee)
			                    <tr>
			                        <td>{{'E00'.$employee->id}} 
			                        	@if(!$employee->user)
			                        	<label class="badge badge-danger">Chưa cấp tk</label>
			                        	@endif
			                        </td>
			                        <td>{{$employee->name}}</td>
			                        <td>{{$employee->dob}}</td>
			                        <td>{{POSITION[$employee->position]}}</td>
			                        <td>{{GENDER[$employee->gender]}}</td>
			                        <td>{{$employee->phone ? $employee->phone : ''}}</td>
			                        @role('Admin|Manager')
			                        <td>
			                            <a href="{{ route('employees.edit',$employee->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$employee->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $employee->id, 'route' => route('employees.destroy', $employee->id), 'action' => 'delete', 'method' => 'delete' ])
	                        			@if(!$employee->user)
			                        		<a href="{{ route('employees.createAccount',$employee->id)}}" class="btn btn-secondary btn-sm btn-rounded btn-fw">
	                            			Cấp ngay
	                        			</a>
			                        	@endif
			                        </td>
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