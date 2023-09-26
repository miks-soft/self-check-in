<?php


namespace App\Services\Localization\DTO\Objects;

use App\Services\Localization\DTO\Collections\LocaleCollection;
use App\DTO\DataTransferObject;
use App\Services\Localization\DTO\Casters\LocaleCollectionCaster;
use Spatie\DataTransferObject\Attributes\CastWith;

class LocaleCollectionDTO extends DataTransferObject {

    #[CastWith(LocaleCollectionCaster::class)]
    public LocaleCollection $locales;
}
