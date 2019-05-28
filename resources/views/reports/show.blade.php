@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Tiêu đề :<strong>{{$report->title}}</strong></h4>
                            <p>Nội dung : {{ $report->content}}</p>
                            <p>Trạng thái :{{REPORT_STATUS[$report->status]}}</p>
                            <p>Thời gian : {{$report->time}}</p>
                            <p>Người gửi : {{$report->user->userable->name}}</p>
                            <p>Kết quả : {{$report->result}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Back</a>
    </div>
@endsection