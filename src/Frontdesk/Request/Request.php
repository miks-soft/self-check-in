<?php


namespace GettSleep\Frontdesk\Request;

use Illuminate\Contracts\Support\Arrayable;

abstract class Request implements Arrayable {
    protected string $path;
    protected string $method;

    protected int $json = 1;

    public function getPath(): string {
        return $this->path;
    }

    public function getMethod(): string {
        return $this->method;
    }


}
