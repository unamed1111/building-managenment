<?php

namespace App\Services;

use PayPal\Api\Payment;

class PaymentService
{
   public function getData($something = null)
    {   
        $data = [];
            $data[] = [
                'name'     => 'Đóng tiền phí',
                'sku'      =>   1,
                'price'    => $something
            ];
        return $data;
    }
}
