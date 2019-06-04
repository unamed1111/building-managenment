@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Thống tin nghiệp vụ <strong>{{$maintenance->id}}</strong></h4>
                            <p>Mô tả nghiệp vụ : {{ $maintenance->description}}</p>
                            <p>Thiết bị:{{$maintenance->device_id}}</p>
                            <p>Ngày bắt đầu: {{date('Y-m-d',strtotime($maintenance->time_start))}}</p>
                            <p>Ngày kết thúc: {{$maintenance->time_end ? date('Y-m-d',strtotime($maintenance->time_end)) : ''}}</p>
                            <p>Chi phí(VND): {{number_format($maintenance->cost) . ' vnđ'}}</p>
                        </div>
                        <div class="col-md-4">
                            @include('maintenances.modal_add_services')
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#services-4" data-whatever="@mdo">Thêm nhân viên</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3> Các Nhân Viên Thực Thi</h3> 
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($maintenance->employees as $employee)
                                <tr>
                                    <td><a href="{{ route('employees.show',$employee->id) }}">{{'A00'.$employee->id}}</a></td>
                                    <td>{{$employee->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    
            </div>
        </div>
    </div>
@endsection