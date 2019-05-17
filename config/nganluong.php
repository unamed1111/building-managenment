<?php
return [
    /*
     * Link api duyệt thanh toán
     *
     *
     * */
    'url_api' => env('URL_API', 'https://www.nganluong.vn/checkout.api.nganluong.post.php'),

    /*
     * Mã kết nối
     *
     *
     * */
    'merchant_id' => env('MERCHANT_ID', '36680'),

    /*
     * Mật khẩu kết nối
     *
     *
     * */
    'merchant_password' => env('MERCHANT_PASSWORD', ''),

    /*
     * Email tài khoản Ngân Lượng
     *
     *
     * */
    'receiver_email' => env('RECEIVER_EMAIL', 'demo@nganluong.vn')
];