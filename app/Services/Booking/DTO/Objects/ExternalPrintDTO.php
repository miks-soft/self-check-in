<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\Enum\PrintStatusEnum;

class ExternalPrintDTO extends DataTransferObject {
    public string $commandId;
    public PrintStatusEnum $status;
}
