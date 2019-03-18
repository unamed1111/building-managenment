@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title">Chủ sở hữu 
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Thông tin chủ sở hữu </p>
					<p>{{'KH00'.$owner->id}}</p>
                    <p>{{$owner->name}}</p>
                    <p>{{GENDER[$owner->gender]}}</p>


		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã căn hộ</th>
		                        <th>Tên căn hộ</th>
		                        <th>Tầng</th>
		                        <th>Diện tích(m2)</th>
		                        <th>Chủ sở hữu</th>
		                        <th>Tòa nhà</th>
		                        <th>Trạng thái</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($owner->apartments as $apartment)
			                    <tr>
			                        <td>{{'A00'.$apartment->id}}</td>
			                        <td>{{$apartment->name}}</td>
			                        <td>{{$apartment->floor}}</td>
			                        <td>{{$apartment->acreage}}</td>
			                        <td>{{$apartment->owner ? $apartment->owner->name : ''}}</td>
			                        <td>{{$apartment->building->name}}</td>
			                        <td>{{APARTMENT_STATUS[$apartment->status]}}</td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
@endsection