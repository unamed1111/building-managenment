<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thanh toán</title>
    <style>
    body {
        font-family: DejaVu Sans;
    }
    .container {
        position: relative;
        text-align: center;
        margin: auto;
    }
    .table {
        width: 100%;
    }

    .table table{
        margin: auto;
        text-align:  center;

    }
    .togtien {
        position: relative;
    }
    .xacnhan {
        margin-left: 50%;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="div">
            <h1>Phiếu thu tiền dịch vụ tháng {{$detail_cost->month}}</h1>  
            <h2><b>{{'Căn hộ: ' . $detail_cost->apartment->name }}</b></h2>
        </div>
        <h3>Danh sách dịch vụ</h3>
        <div class="div table">
            <table border="1">
                <thead>
                    <tr>
                        <th>Tên dịch vụ đang sử dụng sử dụng</th>
                        <th>Số lượng</th>
                        <th>Tiền dịch vụ (vnd)</th>
                        <th>Tổng (vnd)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail_cost->apartment->services as $key => $service)
                        @if (in_array($service->pivot->id, json_decode($detail_cost->service_apartment_id)))
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
        {{-- <div class="togtien"> --}}
            <h3>Tổng tiền thanh toán: <strong>{{number_format($detail_cost->amount). ' vnđ'}}</strong> </h3>
        {{-- </div> --}}
        <br>
        <br>
        <div class="xacnhan">
            <div class="resident">
                <h4>Người đóng tiền</h4>
                @php
                    $date = explode('-', $detail_cost->payment_date);
                @endphp
                <h5>Hà nôi, Ngày {{ isset($date[2]) ? $date[2] : '  ' }}  Tháng {{ isset($date[1]) ? $date[1] : '  ' }}  năm {{ isset($date[0]) ? $date[0] : '  ' }}</h5>
                <p>(Ký, ghi rõ họ tên)</p>  
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="employee">
                <h4>Nhân viên thu tiền</h4>
                <p>(Ký, ghi rõ họ tên)</p> 
            </div>


        </div>
    </div>
    
</body>
</html>
