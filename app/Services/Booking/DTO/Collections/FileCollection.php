<?php


namespace App\Services\Booking\DTO\Collections;


use App\Services\Booking\DTO\Objects\FileDTO;
use Illuminate\Support\Collection;

class FileCollection extends Collection {
    // Add the correct return type here for static analyzers to know which type of array this is
    public function offsetGet($key): FileDTO
    {
        return parent::offsetGet($key);
    }
}
