<div class="modal fade" id="services-{{$user}}-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-1">Thông tin chi tiết dịch vụ:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">{{'Dịch vụ: ' . $service->name}}</h4>
                        <ul class="bullet-line-list">
                            <li>
                              <p>{{'Chi tiết: '.$service->description}}</p>
                            </li>
                            <li>
                                <p>{{'Giá: '.number_format($service->cost)." vnđ"}}</p>
                            </li>
                        </ul>
                        <hr>
                        @if(in_array($service->id, $user_services_id))
                        <label class="btn btn-success btn-block justify-content-center">Đang sử dụng</label>
                        <form action="{{ route('residents.service-delete',$service->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-block" type="submit">Hủy đăng kí</button>
                        </form>
                        @else
                        <div class="accordion basic-accordion" id="accordion-2" role="tablist">
                            <div class="card">
                                <button class="btn btn-primary"  data-toggle="collapse" href="#collapseThree-2" aria-expanded="true" aria-controls="collapseThree-2">Đăng kí ngay</button>
                                <div id="collapseThree-2" class="collapse" role="tabpanel" aria-labelledby="headingThree-2" data-parent="#accordion-2" style="">
                                    <div class="card-body"> 
                                        <form action="{{route('residents.service-store')}}" method="POST" >
                                            @csrf
                                            <input type="number" class="form-control hidden" name="service_id" value="{{$service->id}}"> 
                                            <div class="form-group {{ $errors->has('qty') ? 'has-danger' : ''}}">
                                                <label for="qty" class="col-form-label">Số lượng:</label>
                                                <input type="number" class="form-control" placeholder="Số lượng" name="qty" id="qty" value="{{old('qty')}}"> 
                                                @if ($errors->has('qty'))
                                                    <small class="text-danger">{{ $errors->first('qty') }}</small>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('comment') ? 'has-danger' : ''}}">
                                                <label for="comment" class="col-form-label">Thông tin thêm:</label>
                                                <input type="text" class="form-control" name="comment" id="comment" value="{{old('comment')}}"> 
                                                @if ($errors->has('comment'))
                                                    <small class="text-danger">{{ $errors->first('comment') }}</small>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-secondary">Đăng kí</button>
                                        </form> 
                                    </div>
                                </div>
                              </div>
                          </div>
                        @endif
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>