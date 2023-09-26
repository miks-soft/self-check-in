<?php


namespace App\Services\Booking\DTO\Collections;


use App\Services\Booking\DTO\Objects\ExternalRoomDTO;
use Illuminate\Support\Collection;

class ExternalRoomCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): ExternalRoomDTO
    {
        return parent::offsetGet($key);
    }

    public function getIdAll(): array {
        return $this->pluck('roomId')->toArray();
    }
}
