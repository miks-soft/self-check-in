<?php


namespace GettSleep\Frontdesk\Request;

class PrintRequest extends Request {
    protected string $path = '/externalPrices/PrintCapsuleControl.aspx';
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
