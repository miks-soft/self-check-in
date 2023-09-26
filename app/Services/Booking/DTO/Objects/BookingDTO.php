<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use Carbon\Carbon;
use Spatie\DataTransferObject\Attributes\CastWith;
use App\Services\Booking\DTO\Casters\CarbonApiDateCaster;

class BookingDTO extends DataTransferObject {
    public string $id;

    public int $totalCount;
    public int $totalPrice;
}
