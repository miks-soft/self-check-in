<?php


namespace App\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Objects\BookingDTO;


class BookingWrapperDTO extends DataTransferObject {
    public BookingDTO $booking;
}
