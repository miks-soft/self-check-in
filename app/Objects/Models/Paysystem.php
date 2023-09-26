<?php


namespace App\Objects\Models;


class Paysystem {
    public function __construct(
        protected string $id,
        protected string $externalId = ''
    ) {
    }

    public function getId(): string {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }
}
