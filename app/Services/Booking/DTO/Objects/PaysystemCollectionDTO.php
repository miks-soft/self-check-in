<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Collections\PaysystemCollection;
use App\DTO\DataTransferObject;
use App\Services\Booking\DTO\Casters\PaysystemCollectionCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class PaysystemCollectionDTO extends DataTransferObject {
    #[CastWith(PaysystemCollectionCaster::class)]
    public PaysystemCollection $paysystems;
}
