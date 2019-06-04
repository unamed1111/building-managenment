@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4><b>Tiêu đề</b> : <strong>{{' '.$report->title}}</strong></h4>
                            <p><b>Nội dung</b> : {{ $report->content}}</p>
                            <p><b>Trạng thái </b> :{{REPORT_STATUS[$report->status]}}</p>
                            <p><b>Thời gian</b> : {{$report->time}}</p>
                            <p><b>Người gửi</b> : {{$report->user->userable->name}}</p>
                            <p><b>Kết quả</b> : {{$report->result}}</p>
                            @if($report->status !== 2)
                                @include('reports.modal_done_report')
                            &nbsp;<button type="button" class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#services-{{$report->id}}" data-whatever="@mdo">Đã xử lý</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ route('reports.index') }}" class="btn btn-primary float-right">Back</a>
    </div>
@endsection