<?php


namespace GettSleep\Frontdesk\Response;

class CreateOrderResponse extends Response {

    public function __construct(
        protected string $orderId
    ) {
    }

    public function getOrderId():string {
        return $this->orderId;
    }
}
