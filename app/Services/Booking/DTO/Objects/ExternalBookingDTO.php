<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\Enum\PrintStatusEnum;

class ExternalBookingDTO extends DataTransferObject {
    public string $orderId;
}
