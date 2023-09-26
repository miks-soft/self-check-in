<?php


namespace GettSleep\Frontdesk;

use GettSleep\Frontdesk\Request\Request;
use Psr\Http\Message\RequestInterface;

interface RequestConverter {
    public function convert(Request $request): RequestInterface;
}
