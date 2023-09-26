<?php


namespace GettSleep\Frontdesk\Response;

class AnnulateOrderResponse extends Response {

    public function __construct(
        protected bool $success
    ) {
    }

    public function isSuccess():bool {
        return $this->success === true;
    }
}
