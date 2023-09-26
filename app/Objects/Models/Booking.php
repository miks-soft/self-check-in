<?php


namespace App\Objects\Models;


class Booking {

    public function __construct(
        public ?string $id = null,
        public ?string $fd24_id = null,
    ){
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->fd24_id;
    }
}
