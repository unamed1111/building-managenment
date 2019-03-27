@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Quản lý tài khoản
		            	<a href="{{route('accounts.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin các tòa nhà trong khu vực quản lý </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã tài khoản</th>
		                        <th>Email</th>
		                        <th>Loại Tài khoản</th>
		                        <th>Role</th>
		                        <th>Hành động</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($accounts as $account)
			                    <tr>
			                        <td><a href="{{ route('accounts.show',$account->id) }}">{{'TK00'.$account->userable()->name}}</a></td>
			                        <td>{{$account->email}}</td>
			                        <td>{{ACCOUNT_TYPE[$account->type]}}</td>
			                        <td>{{$account->role. " :Chưa phân role cho các tài khoản "}}</td>
			                        <td>
			                           {{--  <a href="{{ route('accounts.edit',$account->id)}}" class="btn btn-info btn-sm btn-rounded btn-fw">
	                            			<i class="mdi mdi-cloud-download"></i>Sửa
	                        			</a> --}}
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="{{"#delete".$account->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $account->id, 'route' => route('accounts.destroy', $account->id), 'action' => 'delete', 'method' => 'delete' ])
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