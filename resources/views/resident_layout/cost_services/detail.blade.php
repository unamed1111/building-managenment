@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-2">
            <div class="card-body">
                <div class="container-fluid">
                    @include('partials.alert')
                    <div class="row">
                        <div class="form-group form-inline col-md-6">
                            <form action="{{ route('getCostMonthResident') }}" method="POST" accept-charset="utf-8">
                                @csrf
                                <select class="form-control form-inline border-info" name="month"  id="exampleSelectInfo">
                                    <option value="01-19">01-2019</option>
                                    <option value="02-19">02-2019</option>
                                    <option value="03-19">03-2019</option>
                                    <option value="04-19">04-2019</option>
                                    <option value="05-19">05-2019</option>
                                    <option value="06-19">06-2019</option>
                                    <option value="07-19">07-2019</option>
                                    <option value="08-19">08-2019</option>
                                    <option value="09-19">09-2019</option>
                                    <option value="10-19">10-2019</option>
                                    <option value="11-19">11-2019</option>
                                    <option value="12-19">12-2019</option>
                                </select>
                                <button type="submit" class="btn btn-success">Tìm</button>
                            </form>
                        </div>
                        <div class="form-group col-md-6">
                                <h3 class="text-right my-5">Hóa đơn&nbsp;&nbsp;#{{ $detail_cost->month }}</h3>
                        </div>
                    </div>
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
                    @elseif($detail_cost->status == 2 || $detail_cost->status == 3)
                    <div class="col-lg-3 pl-0">
                        <p class="mb-0 mt-5"><strong>Đã thu ngày</strong> : {{ $detail_cost->payment_date }}</p>
                        <p><strong>Đã thanh toán online </strong></p>
                    </div>
                    @endif
                </div>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>Dịch vụ sử dụng trong tháng</th>
                                    <th class="text-right">Số lượng</th>
                                    <th class="text-right">Tiền dịch vụ (vnd)</th>
                                    <th class="text-right">Tổng (vnd)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_cost->apartment->services as $key => $service)
                                    @if (in_array($service->pivot->id, json_decode($detail_cost->service_apartment_id)))
                                        <tr class="text-right">
                                            <td class="text-left">{{$service->name}}</td>
                                            <td>{{$service->pivot->qty}}</td>
                                            <td>{{number_format($service->cost)}}</td>
                                            <td>{{number_format($service->pivot->qty * $service->cost)}}</td>
                                        </tr>
                                    @endif
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
                    @elseif($detail_cost->status == 1)
                    <button href="#" class="btn btn-primary float-right mt-4 ml-2" onclick="return:false;">
                        <i class="mdi mdi-printer mr-1"></i>Đã thanh Toán tại quầy
                    </button>
                    @else
                    <button href="#" class="btn btn-primary float-right mt-4 ml-2" onclick="return:false;">
                        <i class="mdi mdi-printer mr-1"></i>Đã thanh toán
                    </button>
                    @endif
                    <a href="{{ route('residents.cost-service-index') }}" class="btn btn-outline-danger float-right mt-4 ml-2">
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
                <h5 class="modal-title" id="service-1">Thanh Toán online</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <h3>Số tiền phải thu: <strong>{{number_format($detail_cost->amount). ' vnđ'}}</strong> </h3>
                            <p>Hình thức: Thanh toán online với paypal ứng với</p>
                            <p>{{': '.number_format(tranferVndToUsd($detail_cost->amount),2) . ' USD'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('create-payment') }}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$detail_cost->id}}" style="display: none">
                    <input type="text" name="amount"  style="display: none" value="{{number_format(tranferVndToUsd($detail_cost->amount),2)}}">
                    <button type="submit" class="btn btn-success">Thanh toán với paypal</button>
                </form>
                <form action="{{ route('create-vnpay') }}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$detail_cost->id}}" style="display: none">
                    <input type="text" name="amount"  style="display: none" value="{{ $detail_cost->amount }}">
                    <button type="submit" class="btn btn-info">Thanh toán với Vn Pay</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    
@endpush