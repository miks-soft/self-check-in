<?php


namespace App\Objects\Factories;

use App\Objects\Collections\RoomCollection;
use App\Exceptions\BadFactoryParamException;

class RoomCollectionFactory {
    public function make(...$args): RoomCollection {
        if (
            count($args) === 1
            && is_array($args[0])
        ) {
            return $this->makeByArray($args[0]);
        }

        throw new BadFactoryParamException();
    }

    protected function makeByArray(array $rooms): RoomCollection {
        return new RoomCollection($rooms);
    }
}
