@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Quản lý tài khoản
		            	<a href="{{route('users.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            	{{-- @include('partials.search',['route' => route('users.index')]) --}}
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin Tài khoản </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Chủ tài khoản</th>
		                        <th>Email</th>
		                        <th>Loại Tài khoản</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($users as $user)
			                    <tr>
			                        <td>{{$user->userable ? $user->userable->name : 'Admin'}}</a></td>
			                        <td>{{$user->email}}</td>
			                        <td>{{ACCOUNT_TYPE[$user->type]}}</td>
			                        <td>
			                           {{--  <a href="{{ route('users.edit',$user->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a> --}}
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$user->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $user->id, 'route' => route('users.destroy', $user->id), 'action' => 'delete', 'method' => 'delete' ])
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		            <div class="text-center">
			            {{ $users->links() }}
			        </div>
		        </div>
		    </div>
		</div>
	</div>
@endsection