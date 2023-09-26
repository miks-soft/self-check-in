<?php


namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

abstract class DataTransferObject extends \Spatie\DataTransferObject\DataTransferObject implements Arrayable {

    protected function parseArray(array $array): array
    {
        $array = parent::parseArray($array);
        foreach ($array as $key => $value) {
            if ($value instanceof Collection) {
                $array[$key] = $value->toArray();

                continue;
            }
        }

        return $array;
    }
}
