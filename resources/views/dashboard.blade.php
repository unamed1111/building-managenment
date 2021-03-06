@extends('layouts.master')

@section('content')
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
                                        <h3 class="mb-0 font-weight-medium">{{'123.124'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 {{--    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Visitors Statistics</h4>
                    <canvas id="dashboard-bar-chart" height="100"></canvas>
                    <div class="row dashboard-bar-chart-legend mt-5 mb-3">
                        <div class="col">
                            <h2>13</h2>
                            <small class="text-muted">SNOOZED</small>
                            <div class="bg"></div>
                        </div>
                        <div class="col">
                            <h2>45</h2>
                            <small class="text-muted">COMPLETED</small>
                            <div class="bg"></div>
                        </div>
                        <div class="col">
                            <h2>24</h2>
                            <small class="text-muted">OVERDUE</small>
                            <div class="bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="text-gray">TUESDAY, APR 9, 2018</p>
                    <ul class="bullet-line-list pb-3">
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face9.jpg" alt="profile image">
                                    <div class="ml-3">
                                        <h6 class="mb-0">Snapchat Hosts</h6>
                                        <small class="text-muted"> Admin Dashboard </small>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-block mb-0">06</small>
                                    <small class="text-muted d-block">pm</small>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face3.jpg" alt="profile image">
                                    <div class="ml-3">
                                        <h6 class="mb-0">Revise Wireframes</h6>
                                        <small class="text-muted"> Company website </small>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-block mb-0">11</small>
                                    <small class="text-muted d-block">pm</small>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face4.jpg" alt="profile image">
                                    <div class="ml-3">
                                        <h6 class="mb-0">Expert instruction</h6>
                                        <small class="text-muted"> Profile App </small>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-block mb-0">12</small>
                                    <small class="text-muted d-block">pm</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <p class="text-gray mt-4">TUESDAY, APR 10, 2018</p>
                    <ul class="bullet-line-list">
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face7.jpg" alt="profile image">
                                    <div class="ml-3">
                                        <h6 class="mb-0">Great Logo</h6>
                                        <small class="text-muted"> admin logo </small>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-block mb-0">04</small>
                                    <small class="text-muted d-block">pm</small>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face25.jpg" alt="profile image">
                                    <div class="ml-3">
                                        <h6 class="mb-0">Branding Mockup</h6>
                                        <small class="text-muted"> Company website </small>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-block mb-0">08</small>
                                    <small class="text-muted d-block">pm</small>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex">
                                    <img class="img-xs rounded-circle" src="../../../assets/images/faces/face12.jpg" alt="profile image">
                                    <div class="ml-3">
                                        <h6 class="mb-0">Awesome Mobile App</h6>
                                        <small class="text-muted"> Profile App </small>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-block mb-0">09</small>
                                    <small class="text-muted d-block">pm</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Schedules</h4>
                    <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
                        <h3>27 Sep 2018</h3>
                        <small>21 Events</small>
                    </div>
                    <div class="event border-bottom py-3">
                        <p class="mb-2 font-weight-medium">Skype call with alex</p>
                        <div class="d-flex align-items-center">
                            <div class="badge badge-success">3:45 AM</div>
                            <small class="text-muted ml-2">London, UK</small>
                            <div class="image-grouped ml-auto">
                                <img src="../../../assets/images/faces/face10.jpg" alt="profile image">
                                <img src="../../../assets/images/faces/face13.jpg" alt="profile image"> 
                            </div>
                        </div>
                    </div>
                    <div class="event py-3 border-bottom">
                        <p class="mb-2 font-weight-medium">Data Analysing with team</p>
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning">12.30 AM</div>
                            <small class="text-muted ml-2">San Francisco, CA</small>
                            <div class="image-grouped ml-auto">
                                <img src="../../../assets/images/faces/face20.jpg" alt="profile image">
                                <img src="../../../assets/images/faces/face17.jpg" alt="profile image">
                                <img src="../../../assets/images/faces/face14.jpg" alt="profile image"> 
                            </div>
                        </div>
                    </div>
                    <div class="event py-3">
                        <p class="mb-2 font-weight-medium">Meeting with client</p>
                        <div class="d-flex align-items-center">
                            <div class="badge badge-danger">4.15 AM</div>
                            <small class="text-muted ml-2">San Diego, CA</small>
                            <div class="image-grouped ml-auto">
                                <img src="../../../assets/images/faces/face21.jpg" alt="profile image">
                                <img src="../../../assets/images/faces/face16.jpg" alt="profile image"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="row flex-grow">
                <div class="col-sm-6 col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-weight-medium">Sales Statistics</p>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">Dashboard</small>
                                <small class="text-info">73%</small>
                            </div>
                            <div class="progress progress-md mt-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 73%" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 font-weight-medium">Monthly Sales</p>
                            <div class="d-flex justify-content-between mt-2">
                                <small class="text-muted">Charts</small>
                                <small class="text-primary">30%</small>
                            </div>
                            <div class="progress progress-md mt-2">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card card-revenue-table">
                        <div class="card-body">
                            <div class="revenue-item d-flex">
                                <div class="revenue-desc">
                                    <h6>Member Profit</h6>
                                    <p class="font-weight-light"> Average Weekly Profit </p>
                                </div>
                                <div class="revenue-amount">
                                    <p class="text-primary"> +168.900 </p>
                                </div>
                            </div>
                            <div class="revenue-item d-flex">
                                <div class="revenue-desc">
                                    <h6>Total Profit</h6>
                                    <p class="font-weight-light"> Weekly Customer Orders </p>
                                </div>
                                <div class="revenue-amount">
                                    <p class="text-primary"> +6890.00 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card text-center">
                <div class="card-body d-flex flex-column">
                    <div class="wrapper">
                        <img src="../../../assets/images/faces/face10.jpg" class="img-lg rounded-circle mb-2" alt="profile image" />
                        <h4>Elsie Reed</h4>
                        <p class="text-muted">Developer</p>
                        <p class="mt-4 card-text"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Lorem </p>
                        <button class="btn btn-rounded btn-primary btn-sm mt-3 mb-4">Follow</button>
                    </div>
                    <div class="row border-top pt-3 mt-auto">
                        <div class="col-4">
                            <h6 class="font-weight-medium">5896</h6>
                            <p>Post</p>
                        </div>
                        <div class="col-4">
                            <h6 class="font-weight-medium">1596</h6>
                            <p>Followers</p>
                        </div>
                        <div class="col-4">
                            <h6 class="font-weight-medium">7896</h6>
                            <p>Likes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom">
                        <h4 class="card-title">Daily Earnings</h4>
                        <i class="mdi mdi-trending-down"></i>
                    </div>
                    <div class="wrapper pt-4">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <div id="dashboardTrendingProgress"></div>
                            <h2 class="mb-0 ml-3 font-weight-bold">456</h2>
                        </div>
                        <div class="text-center">
                            <div class="btn btn-inverse-danger">5% Decrease</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom">
                        <h4 class="card-title">Marketing Campaign</h4>
                        <i class="mdi mdi-trending-up"></i>
                    </div>
                    <div class="wrapper pt-4">
                        <div class="d-flex justify-content-center align-items-end mb-4">
                            <div class="w-25">
                                <canvas id="dashboardTrendingBars" height="180"></canvas>
                            </div>
                            <h2 class="mb-0 ml-3 font-weight-bold">760</h2>
                        </div>
                        <div class="text-center">
                            <div class="btn btn-inverse-success">5% Increase</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card aligner-wrapper">
                <div class="card-body">
                    <div class="absolute left top bottom h-100 v-strock-2 bg-success"></div>
                    <p class="text-muted mb-2">Số hộ thanh toán</p>
                    <div class="d-flex align-items-center">
                        <h1 class="font-weight-medium mb-2">200</h1>
                        {{-- <h5 class="font-weight-medium text-success ml-2">−14.2%</h5> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-success dot-indicator"></div>
                        <p class="text-muted mb-0 ml-2">Số hộ thanh toán 50</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card aligner-wrapper">
                <div class="card-body">
                    <div class="absolute left top bottom h-100 v-strock-2 bg-primary"></div>
                    <p class="text-muted mb-2">Tổng thu:</p>
                    <div class="d-flex align-items-center">
                        <h1 class="font-weight-medium mb-2">80,520,500,00</h1>
                        {{-- <h5 class="font-weight-medium text-success ml-2">+20.7%</h5> --}}
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bg-primary dot-indicator"></div>
                        <p class="text-muted mb-0 ml-2">Đã thu: 50,520,500,00</p>
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
                        <h1 class="font-weight-medium mb-2">10,000,000</h1>
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

@push('layouts.script')
	<script src=""{{asset('assets/js/demo_1/dashboard_2.js')}}"></script>
@endpush