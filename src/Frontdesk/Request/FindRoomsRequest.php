<?php


namespace GettSleep\Frontdesk\Request;

class FindRoomsRequest extends Request {
    protected string $path = '/externalPrices/jsSearchJoin.aspx';
    protected string $method = 'GET';

    public function __construct(
        protected string    $url,
        protected string    $token,
        protected \DateTime $arrival,
        protected \DateTime $depart,
        protected string    $ages = '',
        protected int       $adults = 1,
        protected int       $byHours = 1
    ) {
        $this->path = $this->url . $this->path;
    }

    public function toArray() {
        return [
            'arrival' => $this->arrival->format('Y-m-d H:i'),
            'depart' => $this->depart->format('Y-m-d H:i'),
            'adults' => $this->adults,
            'byHours' => $this->byHours,
            'ages' => $this->ages,
            'plainJson' => $this->json,
            'filter' => str_replace(['\'', '"'], '', \json_encode([['token' => $this->token]])),
        ];
    }
}
