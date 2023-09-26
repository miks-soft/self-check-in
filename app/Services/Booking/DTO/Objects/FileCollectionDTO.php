<?php


namespace App\Services\Booking\DTO\Objects;

use App\Services\Booking\DTO\Collections\FileCollection;
use App\DTO\DataTransferObject;
use App\DTO\Casters\FileCollectionCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class FileCollectionDTO extends DataTransferObject {

    #[CastWith(FileCollectionCaster::class)]
    public FileCollection $files;
}
