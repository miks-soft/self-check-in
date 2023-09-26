<?php


namespace GettSleep\Frontdesk\Collection;

use GettSleep\Frontdesk\Model\Room;

class Rooms extends \ArrayObject {
    public function offsetSet($key, $val): void {
        if (!($val instanceof Room)) {
            throw new \InvalidArgumentException('Value must be a Room model instance');
        }

        parent::offsetSet($key, $val);
    }

    public function offsetGet($key): Room {
        return parent::offsetGet($key);
    }
}
