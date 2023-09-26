<?php


namespace GettSleep\Frontdesk\Collection;

use GettSleep\Frontdesk\Model\Reserve;

class Reserves extends \ArrayObject {
    public function offsetSet($key, $val): void {
        if (!($val instanceof Reserve)) {
            throw new \InvalidArgumentException('Value must be a Reserve model instance');
        }

        parent::offsetSet($key, $val);
    }

    public function offsetGet($key): Reserve {
        return parent::offsetGet($key);
    }
}
