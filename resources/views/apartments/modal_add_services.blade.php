<div class="modal fade" id="services-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-1">Các dịch vụ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" action="{{route('add_services', $apartment->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                @foreach($services as $service)
                                <div class="form-check col-md-5">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="services[]" value="{{$service->id}}"> {{$service->name}} 
                                    </label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Số lượng</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control form-control-sm" name="qty[]" placeholder="Số lượng" aria-label="qty"> 
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
