<?php


namespace App\Services\Booking\DTO\Collections;


use App\Services\Booking\DTO\Objects\PaysystemDTO;
use Illuminate\Support\Collection;

class PaysystemCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): PaysystemDTO
    {
        return parent::offsetGet($key);
    }
}
