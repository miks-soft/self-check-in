<?php


namespace App\Objects\Factories;

use App\Exceptions\BadFactoryParamException;
use App\Objects\Models\Contact;
use App\Services\Booking\DTO\Objects\ContactDTO;
use Illuminate\Support\Carbon;

class ContactFactory {
    public function make(...$args): Contact {
        if (
            count($args) === 1
            && $args[0] instanceof ContactDTO
        ) {
            return $this->makeByDTO($args[0]);
        }

        throw new BadFactoryParamException();
    }

    protected function makeByDTO(ContactDTO $dto): Contact {
        return new Contact($dto->name, $dto->last_name, $dto->email, $dto->phone, $dto->date_of_birth);
    }
}
