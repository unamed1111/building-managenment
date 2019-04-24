<?php
namespace App\Paypal;


use PayPal\Api\Amount;
use PayPal\Api\Details;

class Paypal
{
    protected $apiContext;
    protected $amount;
    public function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.id'), // client id
                config('services.paypal.secret')
            )
        );
        $this->apiContext->setConfig(config('services.paypal.settings'));
    }

    /**
     * @return Amount
     */
    protected function amount(): Amount
    {
        $amount = new Amount();
        $amount->setCurrency(config('services.paypal.currency'));
        $amount->setTotal($this->amount);
        // $amount->setDetails($this->details());
        return $amount;
    }

    protected function setAmount($totalPrice)
    {
        $this->amount = $totalPrice;
    }

}