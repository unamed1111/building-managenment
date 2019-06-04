@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="row">
                <div class="form-group form-inline col-md-12 justify-content-end">
                    @php
                        $month = ['01-19' => '01-2019', '02-19' => '02-2019', '03-19' => '03-2019','04-19' => '04-2019','05-19' => '05-2019','06-19' => '06-2019','07-19' => '07-2019','08-19' => '08-2019','09-19' => '09-2019','10-19' => '10-2019','11-19' => '11-2019','12-19' => '12-2019'];
                        $this_month = now()->format('m-y');
                    @endphp
                    <select id="select_month" class="form-control form-group border-info" data-url="{!! http_build_query(Request::except('month')) !!}">
                        @foreach($month as $key => $value)
                            <option value="{{ $key }}" {{ request()->has('month') ?  (request()->month == $key ? 'selected' : '') : ($this_month == $key ? 'selected' : '') }} >{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card card-statistics">
                <div class="row">
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-account-multiple-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">Thống kê cư dân</p>
                                    <div class="fluid-container">
                                        <h3 class="mb-0 font-weight-medium">{{isset($resident_count) ? $resident_count : 2405}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-checkbox-marked-circle-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">Phản hồi chưa duyệt</p>
                                    <div class="fluid-container">
                                        <h3 class="mb-0 font-weight-medium">{{isset($report_count) ? $report_count : '20'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-account-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">Tài khoản hệ thống</p>
                                    <div class="fluid-container">
                                        <h3 class="mb-0 font-weight-medium">{{isset($user_count) ? $user_count : '1220'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                <i class="mdi mdi-target text-primary mr-0 mr-sm-4 icon-lg"></i>
                                <div class="wrapper text-center text-sm-left">
                                    <p class="card-text mb-0">Doanh Thu tháng</p>
                                    <div class="fluid-container">
                                        <h3 class="mb-0 font-weight-medium">{{number_format($total_amount_datra - $maintenance_cost) .'vnd'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card aligner-wrapper">
                <div class="card-body">
                    <div class="absolute left top bottom h-100 v-strock-2 bg-success"></div>
                    <p class="text-muted mb-2">Số hộ chưa đóng phí dịch vụ:</p>
                    <div class="d-flex align-items-center">
                        <h1 class="font-weight-medium mb-2">{{$count_chuatra .' hộ'}}</h1>
                        {{-- <h5 class="font-weight-medium text-success ml-2">−14.2%</h5> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-success dot-indicator"></div>
                        <p class="text-muted mb-0 ml-2">Số hộ đã đóng phí: {{$count_datra .' hộ'}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card aligner-wrapper">
                <div class="card-body">
                    <div class="absolute left top bottom h-100 v-strock-2 bg-primary"></div>
                    <p class="text-muted mb-2">Tổng phải thu:</p>
                    <div class="d-flex align-items-center">
                        <h1 class="font-weight-medium mb-2">{{number_format($cost_all).' vnd'}}</h1>
                        {{-- <h5 class="font-weight-medium text-success ml-2">+20.7%</h5> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-primary dot-indicator"></div>
                        <p class="text-muted mb-0 ml-2">Đã thu được: {{number_format($total_amount_datra).' vnd'}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card aligner-wrapper">
                <div class="card-body">
                    <div class="absolute left top bottom h-100 v-strock-2 bg-danger"></div>
                    <p class="text-muted mb-2">Chi phí bảo dưỡng</p>
                    <div class="d-flex align-items-center">
                        <h1 class="font-weight-medium mb-2">{{number_format($maintenance_cost). ' vnd'}}</h1>
                        {{-- <h5 class="font-weight-medium text-success ml-2">+296.6%</h5> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-danger dot-indicator"></div>
                        {{-- <p class="text-muted mb-0 ml-2">Payout for next week $100 </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Phản hồi mới của cư dân</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Người gửi</th>
                                    <th>Tiêu đề</th>
                                    <th>Thời gian</th>
                                    <th>Kết quả</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                <img class="mr-2" src="../../../assets/images/faces/face14.jpg" alt="profile image">{{$report->user->userable->name}}</label>
                                            </div>
                                        </td>
                                        <td>{{$report->title}}</td>
                                        <td>{{\Carbon\Carbon::parse($report->time)->format('Y-m-d')}}</td>
                                        <td>{{$report->result != null ? $report->result : " Chưa có kết quả" }}</td>
                                        <td>
                                            <div class="badge badge-{{$report->status == 2 ? 'success' : ($report->status == 1 ? 'warning' : 'danger')}}"></div>
                                            {{REPORT_STATUS[$report->status]}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#select_month").on('change', function(){
                var url = $(this).data('url');
                if (url.length > 0) {
                    location.href = window.location.pathname + "?" + url + "&month=" + $(this).val();
                } else {
                    location.href = window.location.pathname + "?month=" + $(this).val();
                }
            });
        });

    </script>
@endpush