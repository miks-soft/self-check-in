<?php


namespace GettSleep\Frontdesk\Response;

class ErrorResponse extends Response {

    public function __construct(
        protected string $status,
        protected string $description,
    ) {
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


}
