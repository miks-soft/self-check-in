<?php


namespace App\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;

class AnnulateBookingWrapperDTO extends DataTransferObject {
    public ExternalAnnulateDTO $annulate;
}
