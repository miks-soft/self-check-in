<?php


namespace App\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Objects\PaymentDTO;

class PaymentWrapperDTO extends DataTransferObject {
    public PaymentDTO $payment;
}
