<?php

namespace App\Exceptions;

use Exception;

class BookingRoomAvailabilityException extends Exception
{
    public function __construct(protected string $roomId)
    {
        parent::__construct(__('exceptions.rooms.unavailable', ['id' => $this->roomId]));
    }
}
