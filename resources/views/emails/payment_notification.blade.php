<div>
    <h2>Thông báo về việc đóng phí dịch vụ</h2>
    <p>Bạn vừa đóng phí dịch vụ tháng: <b>{{$cost->month}}</b></p>
    <p>Hình thức thanh toán: {{PAY_STATUS[$cost->status]}} </p>
    <p>Số tiền đã thanh toán: {{ number_format($cost->amount) . ' vnđ'}}</p>
    @if($cost->status == 1)
    <p>Người thu: {{$cost->employee}}</p>
    @endif
</div>
<hr>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="bg-dark text-white">
                <th>Dịch vụ đã sử dụng</th>
                <th>Số lượng</th>
                <th>Tiền dịch vụ (vnd)</th>
                <th>Tổng (vnd)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cost->apartment->services as $key => $service)
                @if (in_array($service->pivot->id, json_decode($cost->service_apartment_id)))
                    <tr>
                        <td>{{$service->name}}</td>
                        <td>{{$service->pivot->qty}}</td>
                        <td>{{number_format($service->cost)}}</td>
                        <td>{{number_format($service->pivot->qty * $service->cost)}}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<hr>
<div>
    <p>Gửi bởi: Ban quản lý!</p>
</div>