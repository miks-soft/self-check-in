<?php


namespace App\Services\Booking\DTO\Collections;

use App\Services\Booking\DTO\Objects\RoomDTO;
use Illuminate\Support\Collection;

class RoomCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): RoomDTO
    {
        return parent::offsetGet($key);
    }
}
