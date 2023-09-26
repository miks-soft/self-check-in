<?php


namespace App\Objects\Collections;

use App\Objects\Models\Room;
use Illuminate\Support\Collection;

class RoomCollection extends Collection {
    public function offsetGet($key): Room
    {
        return parent::offsetGet($key);
    }

    public function canBook() {
        foreach ($this->items as $item) {
            if (!$item->canBook())
                return false;
        }

        return true;
    }
}
