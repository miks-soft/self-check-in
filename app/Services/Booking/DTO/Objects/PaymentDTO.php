<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\Enum\PaymentStatusEnum;

class PaymentDTO extends DataTransferObject {
    public string $bookingId;
    public PaymentStatusEnum $status;
}
