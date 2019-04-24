@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">Các khoản phí phải trả hàng tháng</p>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tháng</th>
                                                <th>Số tiền phải trả</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian đóng tiền</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cost_services as $cost_service)
                                                @if($cost_service->amount != 0)
                                                <tr>
                                                    <td>{{$cost_service->month}}</td>
                                                    <td>{{number_format($cost_service->amount). " vnđ"}}</td>
                                                    <td>
                                                        <label class="badge badge-{{$cost_service->status == 0 ? 'danger' : ( $cost_service->status == 1 ? 'warning' : 'success')}}">{{PAY_STATUS[$cost_service->status]}}</label>
                                                    </td>
                                                    <th>{{$cost_service->payment_date}}</th>
                                                    <th><a href="{{ route('residents.cost-service-show',['month' => $cost_service->month]) }}">Chi tiết</a></th>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    {{$cost_services->links()}}

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection