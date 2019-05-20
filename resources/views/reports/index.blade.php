@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		        		<div class="col-sm-3">
		        			<h4 class="card-title">  Ý kiến góp ý của cư dân
		        			@hasrole('Employee')
			            	<a href="{{route('reports.create')}}" class="btn btn-primary btn-sm btn-rounded">Thêm</a>
							@endhasrole
			            </h4>
		        		</div>
		        		<div class="col-sm-9">
		        			@include('partials.search',['route' => route('reports.index')])
		        		</div>
		        	</div>
		            @include('partials.alert')
		            <p class="card-description"> Tổng hợp các ý kiến của cư dân </p>
		            
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>Mã Ý kiến</th>
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
			                        <td>{{optional($report->user->userable)->name}}</td>
			                        <td>
			                        	@if($report->status !== 2)
			                        		@include('reports.modal_done_report')
			                            &nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#services-{{$report->id}}" data-whatever="@mdo">Hoàn thành</button>
			                            @endif
{{-- 	                        			&nbsp;<button type="button" class="btn btn-primary btn-sm btn-rounded" datac-t*oggle="modal" data-target="{{"#delete".$report->id}}" data-whatever="@mdo">Xóa</button>
	                        			@include('partials.modal',['id'=> $report->id, 'route' => route('reports.destroy', $report->id), 'action' => 'delete', 'method' => 'delete']) --}}
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