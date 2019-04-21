@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Báo Cáo
		            	<a href="{{route('reports.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
		            	@include('partials.search',['route' => route('reports.index')])
		            </h4>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các báo cáo của tòa nhà </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã báo cáo</th>
		                        <th>Tiêu đề</th>
		                        <th>Nội dung</th>
		                        <th>Thời gian</th>
		                        <th>Trạng thái</th>
		                        <th>Người gửi</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($reports as $report)
			                    <tr>
			                        <td><a href="{{ route('reports.show',$report->id) }}">{{'M00'.$report->id}}</a></td>
			                        <td>{{$report->title}}</td>
			                        <td>{{$report->content}}</td>
			                        <td>{{$report->time}}</td>
			                        <td>{{REPORT_STATUS[$report->status]}}</td>
			                        <td>{{$report->user_id}}</td>
			                        <td>
			                        	@if($report->status !== 2)
			                        		@include('reports.modal_done_report')
			                            &nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#services-{{$report->id}}" data-whatever="@mdo">Hoàn thành</button>
			                            @endif
	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" datac-t*oggle="modal" data-target="{{"#delete".$report->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $report->id, 'route' => route('reports.destroy', $report->id), 'action' => 'delete', 'method' => 'delete'])
			                        </td>
			                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
	</div>
@endsection