<?php


namespace GettSleep\Frontdesk\Request;

class PrintStatusRequest extends Request {
    protected string $path = '/externalPrices/CheckPrintCapsuleControl.aspx';
    protected string $method = 'GET';

    public function __construct(
        protected string    $url,
        protected string    $token,
        protected string    $commandId
    ) {
        $this->path = $this->url . $this->path;
    }

    public function toArray() {
        return [
            'token' => $this->token,
            'commandId' => $this->commandId
        ];
    }
}
