<?php


namespace App\Services\Localization\DTO\Casters;

use App\Services\Localization\DTO\Collections\LocaleCollection;
use App\Services\Localization\DTO\Objects\LocaleDTO;
use App\Models\Locale;
use Spatie\DataTransferObject\Caster;

class LocaleCollectionCaster implements Caster
{
    public function cast(mixed $value): LocaleCollection
    {
        return new LocaleCollection(array_map(
            fn (Locale $data) => new LocaleDTO($data->toArray()),
            $value->all()
        ));
    }
}
