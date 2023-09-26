<?php


namespace App\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Objects\ExternalPrintDTO as PrintDTO;

class PrintWrapperDTO extends DataTransferObject {
    public PrintDTO $print;
}
