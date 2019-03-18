@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
                    <h4>Thống tin căn hộ <strong>{{$apartment->name}}</strong></h4>
                    <p>Tầng : {{ $apartment->floor}}</p>
                    <p>Diện tích(m2):{{$apartment->acreage}}</p>
                    <p>Chử sở hữu: {{$apartment->owner ? $apartment->owner->name : ''}}</p>
                    <p>Tòa nhà : {{$apartment->building->name}}</p>
                    <p>Trạng thái: {{APARTMENT_STATUS[$apartment->status]}}</p>
                    <hr>
                    
                    <table class="table table-hover">
                        <caption>Thông tin cư dân của căn hộ </caption>
                        <thead>
                            <tr>
                                <th>Mã cư dân</th>
                                <th>Tên cư dân</th>
                                <th>Ngày sinh</th>
                                <th>Chứng minh thư/ hộ chiếu</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartment->residents as $resident)
                                <tr>
                                    <td>{{'R00'.$resident->id}}</td>
                                    <td>{{$resident->name}}</td>
                                    <td>{{$resident->dob}}</td>
                                    <td>{{$resident->passport}}</td>
                                    <td>{{$resident->phone}}</td>
                                    <td>{{$resident->email}}</td>
                                    <td>{{GENDER[$resident->gender]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
		    </div>
		</div>
	</div>
@endsection