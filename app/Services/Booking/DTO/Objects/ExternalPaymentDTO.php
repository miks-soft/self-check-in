<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\Enum\PaymentStatusEnum;

class ExternalPaymentDTO extends DataTransferObject {
    public PaymentStatusEnum $status;
}
