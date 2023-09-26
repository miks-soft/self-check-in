<?php


namespace GettSleep\Frontdesk\Response;

class PrintResponse extends Response {

    public function __construct(
        protected string $commandId
    ) {
    }

    public function getCommandId():string {
        return $this->commandId;
    }
}
