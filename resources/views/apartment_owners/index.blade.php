@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title">Chủ sở hữu 
		            	<a href="{{route('apartment_owners.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin chủ sở hữu căn hộ </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã </th>
		                        <th>Tên chủ </th>
		                        <th>Giới tính</th>
		                        <th>Số điện thoại</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($owners as $owner)
			                    <tr>
			                        <td> <a href="{{ route('apartment_owners.show', $owner->id) }}">{{'KH00'.$owner->id}}</a></td>
			                        <td>{{$owner->name}}</td>
			                        <td>{{GENDER[$owner->gender]}}</td>
			                        <td>{{$owner->phone}}</td>
			                        <td>
			                            <a href="{{ route('apartment_owners.edit',$owner->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a>
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$owner->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $owner->id,'route' => route('apartment_owners.destroy', $owner->id), 'action' => 'delete', 'method' => 'delete'])
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