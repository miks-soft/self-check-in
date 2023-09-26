<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\Attributes\CastWith;
use App\Services\Booking\DTO\Casters\CarbonApiDateCaster;

class ContactDTO extends DataTransferObject {
    public string $name;
    public string $last_name;
    public string $phone;
    public string $email;

    #[CastWith(CarbonApiDateCaster::class)]
    public Carbon $date_of_birth;
}
