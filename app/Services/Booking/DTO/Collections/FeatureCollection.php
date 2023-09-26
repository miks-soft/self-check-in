<?php


namespace App\Services\Booking\DTO\Collections;


use App\Services\Booking\DTO\Objects\FeatureDTO;
use Illuminate\Support\Collection;

class FeatureCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): FeatureDTO
    {
        return parent::offsetGet($key);
    }
}
