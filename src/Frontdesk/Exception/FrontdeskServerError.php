<?php


namespace GettSleep\Frontdesk\Exception;


class FrontdeskServerError extends \Exception {
    public function __construct(string $message = 'Frontdesk server error.') {
        parent::__construct($message, 0, null);
    }
}
