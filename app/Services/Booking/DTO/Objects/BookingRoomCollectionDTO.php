<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Collections\BookingRoomCollection;
use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\BookingRoomCollectionCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class BookingRoomCollectionDTO extends DataTransferObject {
    #[CastWith(BookingRoomCollectionCaster::class)]
    public BookingRoomCollection $rooms;
}
