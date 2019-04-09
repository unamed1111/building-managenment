@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
                @include('partials.alert')
		        <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Thống tin căn hộ <strong>{{$apartment->name}}</strong></h4>
                            <p>Tầng : {{ $apartment->floor}}</p>
                            <p>Diện tích(m2):{{$apartment->acreage}}</p>
                            <p>Chử sở hữu: {{$apartment->owner ? $apartment->owner->name : ''}}</p>
                            <p>Tòa nhà : {{$apartment->building->name}}</p>
                            <p>Trạng thái: {{APARTMENT_STATUS[$apartment->status]}}</p>
                        </div>
                        <div class="col-md-4">
                            @include('apartments.modal_add_services')
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#services-4" data-whatever="@mdo">Thêm dịch vụ</button>
                            <a href="{{route('bills.compute',$apartment->id)}}">Tính tiền</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3>Thông tin cư dân của căn hộ</h3>
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
                    <div class="row">
                        <h3> Các dịch vụ đang sử dụng</h3> 
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã căn hộ</th>
                                <th>Tên dịch vụ</th>
                                <th>Thời gian đăng kí</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartment->services as $service)
                                <tr>
                                    <td><a href="{{ route('services.show',$service->id) }}">{{'A00'.$service->id}}</a></td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->pivot->registration_time}}</td>
                                    <td>{{$service->pivot->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="row">
                        <h3> Chi phí sử dụng</h3> 
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã bill</th>
                                <th>Tên dịch vụ</th>
                                <th>Thời gian đăng kí</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartment->services as $service)
                                <tr>
                                    <td><a href="{{ route('services.show',$service->id) }}">{{'A00'.$service->id}}</a></td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->pivot->registration_time}}</td>
                                    <td>{{$service->pivot->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>    
		    </div>
		</div>
	</div>
@endsection