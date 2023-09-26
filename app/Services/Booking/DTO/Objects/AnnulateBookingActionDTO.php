<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;

class AnnulateBookingActionDTO extends DataTransferObject {
    public string $bookingId;
}
