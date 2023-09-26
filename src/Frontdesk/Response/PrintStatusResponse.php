<?php


namespace GettSleep\Frontdesk\Response;

use GettSleep\Frontdesk\Enum\PrintStatusEnum;

class PrintStatusResponse extends Response {

    public function __construct(
        protected PrintStatusEnum $status
    ) {
    }

    public function getStatus():PrintStatusEnum {
        return $this->status;
    }
}
