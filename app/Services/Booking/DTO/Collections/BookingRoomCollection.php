<?php


namespace App\Services\Booking\DTO\Collections;

use App\Services\Booking\DTO\Objects\BookingRoomDTO;
use Illuminate\Support\Collection;

class BookingRoomCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): BookingRoomDTO
    {
        return parent::offsetGet($key);
    }
}
