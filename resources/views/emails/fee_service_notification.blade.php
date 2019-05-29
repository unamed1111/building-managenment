<div>
    <h2>Thông báo về việc đóng phí dịch vụ tháng <b>{{$cost->month}}</b> </h2>
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
    <p>Tổng tiền dịch vụ phải đóng: <b>{{ number_format($cost->amount). ' vnđ' }}</b></p>
<hr>
<div>
    <p>Gửi bởi: Ban quản lý!</p>
</div>