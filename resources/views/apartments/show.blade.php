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
                            <p>Chử sở hữu: {{$apartment->owner_name}}</p>
                            <p>Tòa nhà : {{$apartment->building->name}}</p>
                            <p>Trạng thái: {{APARTMENT_STATUS[$apartment->status]}}</p>
                        </div>
                        <div class="col-md-4">
                            @include('apartments.modal_add_services')
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#services-4" data-whatever="@mdo">Thêm dịch vụ</button>
                        </div>
                    </div>
                    <hr>
                    <div class=" row table-responsive">
                        <div class="col-md-12">
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
                    </div>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row title">
                                <div class="col-md-6">
                                    <h3> Các dịch vụ đang sử dụng</h3>
                                </div>
                                <div class="col-md-2">
                                     <a  class="btn btn-outline-dark" href="{{ route('create_cost_service',['id'=> $apartment->id, 'month' => \Carbon\Carbon::createFromDate()->format('m-y')]) }}">Tạo hóa đơn</a>
                                </div>
                                <div class="col-md-2">
                                    @php
                                        $now = \Carbon\Carbon::createFromDate();
                                    @endphp
                                    <a  class="btn btn-outline-dark" href="{{ route('show_cost_service',['id'=> $apartment->id, 'month' => $now->format('m-y')]) }}">Thông tin Phí dịch vụ tháng {{ $now->format('m'). ' năm '. $now->format('Y')  }}</a>
                                </div>  
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã dịch vụ</th>
                                        <th>Tên dịch vụ</th>
                                        <th>Số lượng</th>
                                        <th>Thời gian đăng kí</th>
                                        <th>Hủy dịch vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php
                                            
                                        @endphp
                                    @foreach($apartment->services as $service)
                                        @if(\Carbon\Carbon::now()->format('Y-m-d') >=  $service->pivot->registration_time)
                                        <tr>
                                            <td><a href="{{ route('services.show',$service->id) }}">{{'A00'.$service->id}}</a></td>
                                            <td>{{$service->name}}</td>
                                            <td>{{$service->pivot->qty}}</td>
                                            <td>{{$service->pivot->registration_time}}</td>
                                            <td><form class="forms-sample" action="{{route('delete_services', $apartment->id)}}" method="POST">
                                                @csrf
                                                <input type="text" name="service_id" hidden value="{{$service->id}}">
                                                <button type="submit" class="btn btn-danger">Hủy dịch vụ</button>
                                            </form>
                                            </td>

                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                             <a class="btn btn-outline-dark" class="btn btn-outline-dark" data-toggle="modal" data-target="#detail-cost" >Thông tin các tháng khác</a>
                        </div>
                    </div>
		    </div>
		</div>
	</div>
@endsection


@push('js')
    <script>
        $(document).on('click', '.service-chose', function(event) {
            event.preventDefault();
            var serviceID = $(this).attr('data-serviceID');
            var serviceName = $(this).attr('data-serviceName');
            var servicePrice = $(this).attr('data-servicePrice');
                $('.service-id').val(serviceID)
                $('.service-name').html(serviceName)
                $('.service-price').html(servicePrice + ' vnđ')
            $('#services-4').modal('hide')
            $('#modal-form').modal('show')


        });
        $(document).on('click', '.back-modal', function(event) {
            event.preventDefault();
            $('#modal-form').modal('hide')
            $('#services-4').modal('show')
        });
    </script>
@endpush