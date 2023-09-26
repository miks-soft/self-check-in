<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\ExternalPrintDTO;
use App\Services\Booking\Enum\PrintStatusEnum;
use GettSleep\Frontdesk\Enum\PrintStatusEnum as FrontdeskPrintStatusEnum;
use App\Exceptions\BadFactoryParamException;
use GettSleep\Frontdesk\Response\PrintResponse;
use GettSleep\Frontdesk\Response\PrintStatusResponse;

class ExternalPrintDTOFactory {
    public function make(...$args): ExternalPrintDTO {
        if (
            count($args) === 2
            && is_string($args[0])
            && $args[1] instanceof PrintStatusEnum
        )
            return $this->makeByEnum($args[0], $args[1]);

        if (
            count($args) === 1
            && $args[0] instanceof PrintResponse
        )
            return $this->makeByResponse($args[0]);

        if (
            count($args) === 2
            && $args[0] instanceof PrintStatusResponse
            && is_string($args[1])
        )
            return $this->makeByStatusResponse($args[0], $args[1]);

        throw new BadFactoryParamException();
    }

    protected function makeByEnum(string $commandId, PrintStatusEnum $status) : ExternalPrintDTO {
        return new ExternalPrintDTO(['commandId' => $commandId, 'status' => $status]);
    }

    protected function makeByResponse(PrintResponse $print) : ExternalPrintDTO {
        return new ExternalPrintDTO(['commandId' => $print->getCommandId(), 'status' => PrintStatusEnum::Waiting]);
    }

    protected function makeByStatusResponse(PrintStatusResponse $print, string $commandId) : ExternalPrintDTO {
        $status = match ($print->getStatus()) {
            FrontdeskPrintStatusEnum::Printed => PrintStatusEnum::Printed,
            FrontdeskPrintStatusEnum::Waiting => PrintStatusEnum::Waiting,
        };

        return new ExternalPrintDTO(['commandId' => $commandId, 'status' => $status]);
    }
}
