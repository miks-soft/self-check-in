<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\FileCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class FeatureDTO extends DataTransferObject {

    #[CastWith(FileCaster::class)]
    public FileDTO $picture;

    public string $title;
}
