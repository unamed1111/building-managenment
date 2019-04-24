@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Thống tin dịch vụ <strong>{{$service->name}}</strong></h4>
                            <p>Giá : {{ $service->cost}}</p>
                            <p>Đơn vị :{{SERVICE_UNIT[$service->unit]}}</p>
                            <p>Mô tả : {{$service->description ? $service->description : ''}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3> Các căn hộ đang sử dụng</h3> 
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã căn hộ</th>
                                <th>Thời gian đăng kí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($apartments as $apartment)
                                <tr>
                                    <td><a href="{{ route('apartments.show',$apartment->id) }}">{{'A00'.$apartment->id}}</a></td>
                                    <td>{{$apartment->pivot->registration_time}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{$apartments->links()}}
            </div>
        </div>
    </div>
@endsection