<?php


namespace App\Services\Localization\DTO\Casters;

use App\Services\Localization\DTO\Collections\LocalizationCollection;
use App\Services\Localization\DTO\Objects\LocalizationDTO;
use Spatie\DataTransferObject\Caster;
use TCG\Voyager\Translator;

class LocalizationCollectionCaster implements Caster
{
    public function cast(mixed $value): LocalizationCollection
    {
        return new LocalizationCollection(array_map(
            fn (Translator $data) => new LocalizationDTO(['slug' => $data->slug, 'text' => $data->text]),
            $value->all()
        ));
    }
}
