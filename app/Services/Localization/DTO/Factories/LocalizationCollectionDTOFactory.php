<?php


namespace App\Services\Localization\DTO\Factories;

use App\Services\Localization\DTO\Objects\LocalizationCollectionDTO;
use App\Exceptions\BadFactoryParamException;
use TCG\Voyager\Translator\Collection;

class LocalizationCollectionDTOFactory {
    public function make(...$args): LocalizationCollectionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof Collection
        )
            return $this->makeByDomain($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByDomain(Collection $domain) : LocalizationCollectionDTO {
        return new LocalizationCollectionDTO(['localizations' => $domain]);
    }
}
