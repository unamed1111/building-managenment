@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title">  Cư dân
			            	<a href="{{route('residents.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
			            </h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('residents.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Danh sách cư dân tòa nhà</p>
		            <div class="table-responsive">
			            <table class="table table-hover">
			                <thead>
			                    <tr>
			                        <th>Mã cư dân</th>
			                        <th>Tên cư dân</th>
			                        <th>Ngày sinh</th>
			                        <th>Số điện thoại</th>
			                        <th>Email</th>
			                        <th>Giới tính</th>
			                        <th>Căn hộ</th>
			                        <th>Hành động</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($residents as $resident)
				                    <tr>
				                        <td>{{'R00'.$resident->id}}</td>
				                        <td>{{$resident->name}}</td>
				                        <td>{{$resident->dob}}</td>
				                        <td>{{$resident->phone}}</td>
				                        <td>{{$resident->email}}</td>
				                        <td>{{GENDER[$resident->gender]}}</td>
				                        <td>{{$resident->apartment ? $resident->apartment->name : 'Không có nhà'}}</td>
				                        <td>
				                            <a href="{{ route('residents.edit',$resident->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
		                            			<i class="mdi mdi-cloud-download"></i>Sửa
		                        			</a>
		                        			<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$resident->id}}" data-whatever="@mdo">Xóa</button>
		                        			@include('partials.modal',['id'=> $resident->id, 'route' => route('residents.destroy', $resident->id), 'action' => 'delete', 'method' => 'delete' ])
		                        			@if(!$resident->user)
				                        		<a href="{{ route('residents.createAccount',$resident->id)}}" class="btn btn-secondary btn-sm btn-rounded btn-fw">
		                            			Cấp tài khoản
		                        				</a>
		                        			@endif
				                        </td>
				                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			            {{$residents->links()}}
		            </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection