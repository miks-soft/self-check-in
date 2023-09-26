<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\Attributes\CastWith;
use App\Services\Booking\DTO\Casters\CarbonApiDateTimeCaster;


class FindRoomsActionDTO extends DataTransferObject {
    #[CastWith(CarbonApiDateTimeCaster::class)]
    public Carbon $dateIn;

    #[CastWith(CarbonApiDateTimeCaster::class)]
    public Carbon $dateOut;
}
