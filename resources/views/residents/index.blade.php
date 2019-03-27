@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Cư dân
		            	<a href="{{route('residents.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Danh sách cư dân tòa nhà</p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã cư dân</th>
		                        <th>Tên cư dân</th>
		                        <th>Ngày sinh</th>
		                        <th>Chứng minh thư/ hộ chiếu</th>
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
			                        <td>{{$resident->passport}}</td>
			                        <td>{{$resident->phone}}</td>
			                        <td>{{$resident->email}}</td>
			                        <td>{{GENDER[$resident->gender]}}</td>
			                        <td>{{$resident->apartment ? $resident->apartment->name : 'Không có nhà'}}</td>
			                        <td>
			                            <a href="{{ route('residents.edit',$resident->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#add".$resident->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $resident->id, 'route' => route('residents.destroy', $resident->id), 'action' => 'delete', 'method' => 'delete'])
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