<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\PaysystemCollectionDTO;
use App\Exceptions\BadFactoryParamException;
use TCG\Voyager\Translator\Collection;

class PaysystemCollectionDTOFactory {
    public function make(...$args): PaysystemCollectionDTO {
        if (
            count($args) === 1
            && $args[0] instanceof Collection
        )
            return $this->makeByCollection($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByCollection(Collection $collection) : PaysystemCollectionDTO {
        return new PaysystemCollectionDTO(['paysystems' => $collection]);
    }
}
