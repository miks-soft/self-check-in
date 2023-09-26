<?php


namespace GettSleep\Frontdesk\Exception;

class HttpClientException extends \Exception {
    public function __construct(?\Throwable $previous = null)
    {
        parent::__construct('Frontdesk Http client error.', 0, $previous);
    }
}
