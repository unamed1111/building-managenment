<div class="modal fade" id="services-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-1">Lựa chọn dịch vụ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                @foreach($services as $service)
                    <div style="cursor: pointer;" data-servicePrice="{{number_format($service->cost). ' vnđ'}}" data-serviceID="{{$service->id}}" data-serviceName="{{$service->name}}" class="col-sm-6 grid-margin stretch-card service-chose">
                        <div class="card card-statistics bg-orange-gradient">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                      <i class="mdi mdi-receipt icon-lg"></i>
                                    </div>
                                    <div class="float-right">
                                      <p class="mb-0 text-right">Giá</p>
                                      <div class="fluid-container">
                                        <h5 class="font-weight-medium text-right mb-0">{{number_format($service->cost). ' vnđ'}}</h5>
                                      </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">
                                <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> {{$service->name}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-1">Đăng kí dịch vụ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" action="{{route('add_services', $apartment->id)}}" method="POST">
                @csrf
                <input type="text" hidden name="service_id" class="service-id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics bg-orange-gradient">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                          <i class="mdi mdi-receipt icon-lg"></i>
                                        </div>
                                        <div class="float-right">
                                          <p class="mb-0 text-right">Giá</p>
                                          <div class="fluid-container">
                                            <h5 class="font-weight-medium text-right mb-0 service-price"></h5>
                                          </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0">
                                    <i class="mdi mdi-bookmark-outline mr-1  service-name" aria-hidden="true"></i>  </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 grid-margin stretch-card">
                            <div class="form-group">
                                <label for="">Số lượng *</label>
                                <input required class="form-control" type="number" name="qty" min="0" placeholder="Số lượng" value="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button class="btn btn-light back-modal">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-cost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-1">Xem thông tin chi phí dịch vụ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @php
                        $month = ['01-19' => '01-2019', '02-19' => '02-2019', '03-19' => '03-2019','04-19' => '04-2019','05-19' => '05-2019','06-19' => '06-2019','07-19' => '07-2019','08-19' => '08-2019','09-19' => '09-2019','10-19' => '10-2019','11-19' => '11-2019','12-19' => '12-2019'];
                        $this_month = now()->format('m-y');
                    @endphp
                    @foreach($month as $key => $value)
                    <div class="col-md-3">
                        <a href="{{ route('show_cost_service',['id'=> $apartment->id, 'month' => $key]) }}">Tháng {{ $value }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>