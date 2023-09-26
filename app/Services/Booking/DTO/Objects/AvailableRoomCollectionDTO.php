<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Collections\ExternalRoomCollection;
use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\ExternalRoomCollectionCaster;
use Carbon\Carbon;
use Spatie\DataTransferObject\Attributes\CastWith;

class AvailableRoomCollectionDTO extends DataTransferObject {

    public Carbon $dateIn;
    public Carbon $dateOut;

    #[CastWith(ExternalRoomCollectionCaster::class)]
    public ExternalRoomCollection $rooms;
}
