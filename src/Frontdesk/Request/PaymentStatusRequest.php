<?php


namespace GettSleep\Frontdesk\Request;

class PaymentStatusRequest extends Request {
    protected string $path = '/externalPrices/CheckPayment.aspx';
    protected string $method = 'GET';

    public function __construct(
        protected string    $url,
        protected string    $token,
        protected string    $orderId
    ) {
        $this->path = $this->url . $this->path;
    }

    public function toArray() {
        return [
            'token' => $this->token,
            'orderId' => $this->orderId
        ];
    }
}
