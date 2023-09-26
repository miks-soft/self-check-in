<?php


namespace App\Services\Booking\DTO\Factories;

use App\Services\Booking\DTO\Objects\ExternalPaymentDTO;
use GettSleep\Frontdesk\Enum\PaymentStatusEnum as FrontdeskPaymentStatusEnum;
use App\Services\Booking\Enum\PaymentStatusEnum;
use App\Exceptions\BadFactoryParamException;
use GettSleep\Frontdesk\Response\PaymentStatusResponse;

class ExternalPaymentDTOFactory {
    public function make(...$args): ExternalPaymentDTO {
        if (
            count($args) === 1
            && $args[0] instanceof PaymentStatusEnum
        )
            return $this->makeByEnum($args[0]);

        elseif (
            count($args) === 1
            && $args[0] instanceof PaymentStatusResponse
        )
            return $this->makeByResponse($args[0]);

        throw new BadFactoryParamException();
    }

    protected function makeByEnum(PaymentStatusEnum $status) : ExternalPaymentDTO {
        return new ExternalPaymentDTO(['status' => $status]);
    }

    protected function makeByResponse(PaymentStatusResponse $response) : ExternalPaymentDTO {
        $status = match ($response->getStatus()) {
            FrontdeskPaymentStatusEnum::Failed => PaymentStatusEnum::Failed,
            FrontdeskPaymentStatusEnum::Waiting => PaymentStatusEnum::Waiting,
            FrontdeskPaymentStatusEnum::Paid => PaymentStatusEnum::Paid,
        };

        return new ExternalPaymentDTO(['status' => $status]);
    }
}
