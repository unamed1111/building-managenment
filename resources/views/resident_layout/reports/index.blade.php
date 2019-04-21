@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
		    <div class="card">
		        <div class="card-body">
		            <h4 class="card-title"> Ý kiến của bạn về tòa nhà
					<div class="accordion basic-accordion" id="accordion" role="tablist">
					    <div class="card">
					        <div class="card-header" role="tab" id="headingOne">
					            <h6 class="mb-0">
					                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					                <i class="card-icon mdi mdi-checkbox-marked-circle-outline"></i>Tạo Ý kiến </a>
					            </h6>
					        </div>
					        <div id="collapseOne" class="collapse {{session()->has('errors') ? 'show' : ''}}" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					            <div class="card-body">
				                    <form action="{{route('residents.report-store')}}" method="POST" >
				                        @csrf
					                    <div class="form-group {{ $errors->has('title') ? 'has-danger' : ''}}">
					                        <label for="title" class="col-form-label">Tiêu đề:</label>
					                        <input type="text" class="form-control" placeholder="Tiêu đề" name="title" id="title" value="{{old('title')}}"> 
					                        @if ($errors->has('title'))
					                            <small class="text-danger">{{ $errors->first('title') }}</small>
					                        @endif
					                    </div>
					                    <div class="form-group {{ $errors->has('content') ? 'has-danger' : ''}}">
					                        <label for="content" class="col-form-label">Nội dung:</label>
					                        <input type="text" class="form-control" placeholder="Nội dung" name="content" id="content" value="{{old('content')}}"> 
					                        @if ($errors->has('content'))
					                            <small class="text-danger">{{ $errors->first('content') }}</small>
					                        @endif
					                    </div>
					                    <button type="submit" class="btn btn-primary">Gửi</button>
					                </form> 
				                </div>
					        </div>
					    </div>
					</div>
		            </h4>
		            <p class="card-description"> Tổng hợp các báo cáo của tòa nhà </p>
			            <div class="col-lg-12 grid-margin stretch-card">
						    <div class="card">
						        <div class="card-body">
						            <table class="table table-hover">
						                <thead>
						                    <tr>
						                        <th>Tiêu đề</th>
						                        <th>Thời gian</th>
						                        <th>Kết quả</th>
						                        <th>Trạng thái</th>
						                    </tr>
						                </thead>
						                <tbody>
						                	@foreach($reports as $report)
							                    <tr>
							                        <td>{{$report->title}}</td>
							                        <td>{{$report->time}}</td>
							                        <td class="text-info" style="word-break: break-word; width: 30%"> {{$report->result ? : 'Chưa có Phản hồi '}}							
							                        	{{-- <i class="mdi mdi-arrow-down"></i> --}}
							                        </td>
							                        <td>
							                            <label class="badge badge-{{$report->status == 0 ? 'danger' : ( $report->status == 1 ? 'warning' : 'success')}}">{{REPORT_STATUS[$report->status]}}</label>
							                        </td>
							                    </tr>
							                    @include('resident_layout.reports.modal_report_show')
						                    @endforeach
						                </tbody>
						            </table>
						        </div>
						            {{$reports->links()}}

						    </div>
						</div>
		        </div>
		    </div>
		</div>
	</div>
@endsection