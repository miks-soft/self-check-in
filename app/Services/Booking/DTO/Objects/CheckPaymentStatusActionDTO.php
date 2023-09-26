<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;


class CheckPaymentStatusActionDTO extends DataTransferObject {
    public string $bookingId;
}
