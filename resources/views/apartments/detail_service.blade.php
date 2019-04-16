@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-2">
            <div class="card-body">
                <div class="container-fluid">
                    <h3 class="text-right my-5">Hóa đơn&nbsp;&nbsp;#{{ $detail_cost->month }}</h3>
                    <hr>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 pl-0">
                        <p class="mt-5 mb-2">
                            <b>{{'Căn hộ: ' . $detail_cost->apartment->name }}</b>
                        </p>
                            <br>{{'Tầng: ' . $detail_cost->apartment->floor }}
                            <br>{{'Tòa: ' . $detail_cost->apartment->building->name }}
                        </p>
                    </div>
                    <div class="col-lg-3 pr-0">
                        <p class="mt-5 mb-2 text-right">
                            <b>Người đứng tên</b>
                        </p>
                        <p class="text-right">{{'Ông/Bà: ' . $detail_cost->apartment->owner_name }},
                            <br> {{'Số điện thoại liên hệ: ' . $detail_cost->apartment->phone}}
                        </p>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5">Ngày tạo hóa đơn : 25-{{ $detail_cost->month }}</p>
                        <p>Ngày đến hạn thu tiền : 30-{{ $detail_cost->month }}</p>
                    </div>
                    @if($detail_cost->status == 1)
                    <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5"><strong>Đã thu ngày</strong> : {{ $detail_cost->payment_date }}</p>
                        <p><strong>Người thu: </strong> {{ $detail_cost->employee->name }}</p>
                    </div>
                    @else($detail_cost->status == 2)
                    <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5"><strong>Đã thu ngày</strong> : {{ $detail_cost->payment_date }}</p>
                        <p><strong>Trả tiền bằng tài khoản ngân hàng </strong></p>
                    </div>
                    @endif
                </div>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>#</th>
                                    <th>Dịch vụ sử dụng</th>
                                    <th class="text-right">Số lương</th>
                                    <th class="text-right">Tiền dịch vụ (vnd)</th>
                                    <th class="text-right">Tổng (vnd)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_cost->apartment->services as $key => $service)
                                <tr class="text-right">
                                    <td class="text-left">{{$key+1}}</td>
                                    <td class="text-left">{{$service->name}}</td>
                                    <td>{{$service->pivot->qty}}</td>
                                    <td>{{number_format($service->cost)}}</td>
                                    <td>{{number_format($service->pivot->qty * $service->cost)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container-fluid mt-5 w-100">
                    <h4 class="text-right mb-5">Tổng : {{number_format($detail_cost->amount).' (vnd)'}}</h4>
                    <hr>
                </div>
                <div class="container-fluid w-100">
                    @if($detail_cost->status == 0)
                    <a type="button" data-toggle="modal" data-target="#modal_thanh_toan" class="btn btn-success float-right mt-4">
                        <i class="mdi mdi-telegram mr-1"></i>Thanh Toán</a>
                    @else
                    <button href="#" class="btn btn-primary float-right mt-4 ml-2" onclick="return:false;">
                        <i class="mdi mdi-printer mr-1"></i>Hóa Đơn đã thanh Toán
                    </button>
                    @endif
                    <a href="{{ route('apartments.show',$detail_cost->apartment_id) }}" class="btn btn-outline-danger float-right mt-4 ml-2">
                        <i class="mdi mdi-previous mr-1"></i>Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_thanh_toan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-1">Thanh Toán hóa đơn cho cư dân</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <h3>Số tiền phải thu: <strong>{{number_format($detail_cost->amount). ' vnđ'}}</strong> </h3>
                            <p>Nhân viên ấn xác nhận thanh toán để hoàn tất thanh toán cho cư dân</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('hoan_tat_thanh_toan',$detail_cost->id) }}" class="btn btn-success">Nhân viên xác nhận đã thanh toán</a>
                <a type="button" class="btn btn-light" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

@endsection