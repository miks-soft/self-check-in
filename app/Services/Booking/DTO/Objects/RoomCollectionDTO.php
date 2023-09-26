<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Collections\RoomCollection;
use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\RoomCollectionCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class RoomCollectionDTO extends DataTransferObject {
    #[CastWith(RoomCollectionCaster::class)]
    public RoomCollection $rooms;
}
