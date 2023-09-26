<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Casters\CarbonApiDateTimeCaster;
use App\Services\Booking\DTO\Collections\FeatureCollection;
use App\Services\Booking\DTO\Collections\FileCollection;
use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\FeatureCollectionCaster;
use App\Services\Booking\DTO\Casters\FileCaster;
use App\Services\Booking\DTO\Casters\FileCollectionCaster;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class BookingRoomDTO extends DataTransferObject {
    public string $id;
    public int $count = 0;
    public int $availableCount = 0;

    #[CastWith(CarbonApiDateTimeCaster::class)]
    public ?Carbon $dateIn = null;

    #[CastWith(CarbonApiDateTimeCaster::class)]
    public ?Carbon $dateOut = null;
}
