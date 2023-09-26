<?php


namespace App\Services\Localization\DTO\Factories;

use App\Services\Localization\DTO\Objects\LocaleCollectionDTO;
use App\Exceptions\BadFactoryParamException;
use Illuminate\Database\Eloquent\Collection;

class LocaleCollectionDTOFactory {
    public function make(...$args): LocaleCollectionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof Collection
        )
            return $this->makeByDomain($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByDomain(Collection $domain) : LocaleCollectionDTO {
        return new LocaleCollectionDTO(['locales' => $domain]);
    }
}
