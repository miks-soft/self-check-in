<?php


namespace App\Services\Booking\DTO\Objects;

use App\DTO\DataTransferObject;

use App\Services\Booking\DTO\Casters\StorageAssetSrcCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class FileDTO extends DataTransferObject {

    #[CastWith(StorageAssetSrcCaster::class)]
    public string $src;
}
