<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Paypal\CreatePayment;
use App\Paypal\ExecutePayment;
use App\Services\PaymentService;
use App\Services\ApartmentService;

class PaymentController extends Controller
{
    protected $payment_service;
    protected $apSer;


    public function __construct(PaymentService $service,ApartmentService $apSer)
    {
        $this->middleware('auth');
        $this->payment_service = $service;
        $this->apSer = $apSer;
    }

    public function create(Request $request)
    {   
        session(['url_prev' => url()->previous()]);
        session(['cost_id' => $request->id]);
        $data = $this->payment_service->getData($request->amount);
        $payment = new CreatePayment;
        return $payment->create($data);
    }

    public function execute()
    {
        $payment = new ExecutePayment;
        $payment->execute();     
        // $execute = $this->payment_service->saveData($payment->execute());
        $this->apSer->thanhtoanonline(session('cost_id'), 2); // 2 là thanh toan bang paypal
        $url = session('url_prev','/');
        session()->forget('url_prev');
        session()->forget('cost_id');
        return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
    }
}
