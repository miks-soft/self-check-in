<?php


namespace GettSleep\Frontdesk\Model;

class ReservePaysystem {
    public function __construct(
        protected string $type
    ) {}

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
