<?php


namespace GettSleep\Frontdesk\Request;

class AnnulateOrderRequest extends Request {
    protected string $path = '/externalPrices/AnnulateOrder.aspx';
    protected string $method = 'POST';

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
