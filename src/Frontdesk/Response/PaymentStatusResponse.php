<?php


namespace GettSleep\Frontdesk\Response;

use GettSleep\Frontdesk\Enum\PaymentStatusEnum;

class PaymentStatusResponse extends Response {

    public function __construct(
        protected PaymentStatusEnum $status
    ) {
    }

    public function getStatus():PaymentStatusEnum {
        return $this->status;
    }
}
