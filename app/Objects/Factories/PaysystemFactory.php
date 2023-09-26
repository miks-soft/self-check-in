<?php


namespace App\Objects\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Objects\Models\Contact;
use App\Objects\Models\Paysystem;
use App\Services\Booking\DTO\Objects\PaysystemDTO;

class PaysystemFactory {
    public function make(...$args): Paysystem {
        if (
            count($args) === 1
            && $args[0] instanceof PaysystemDTO
        ) {
            return $this->makeByDTO($args[0]);
        }

        throw new BadFactoryParamException();
    }

    protected function makeByDTO(PaysystemDTO $paysystem): Paysystem {
        $ps = new Paysystem($paysystem->id, $paysystem->externalId);

        return $ps;
    }
}
