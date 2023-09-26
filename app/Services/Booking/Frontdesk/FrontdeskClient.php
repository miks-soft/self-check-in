<?php


namespace App\Services\Booking\Frontdesk;

use App\Contracts\ExternalBookingClientContract;
use App\Exceptions\ExternalBookingServiceError;
use App\Objects\Models\BookingAggregate;
use App\Objects\Models\BookingInterval;
use App\Services\Booking\DTO\Factories\ExternalAnnulateDTOFactory;
use App\Services\Booking\DTO\Factories\ExternalBookingDTOFactory;
use App\Services\Booking\DTO\Factories\ExternalPaymentDTOFactory;
use App\Services\Booking\DTO\Factories\ExternalPrintDTOFactory;
use App\Services\Booking\DTO\Factories\AvailableRoomCollectionDTOFactory;
use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;
use App\Services\Booking\DTO\Objects\ExternalBookingDTO;
use App\Services\Booking\DTO\Objects\ExternalPaymentDTO;
use App\Services\Booking\DTO\Objects\ExternalPrintDTO;
use App\Services\Booking\DTO\Objects\AvailableRoomCollectionDTO;
use GettSleep\Frontdesk\Client;
use GettSleep\Frontdesk\Collection\Reserves;
use GettSleep\Frontdesk\Model\Reserve;
use GettSleep\Frontdesk\Model\ReserveContact;
use GettSleep\Frontdesk\Model\ReservePaysystem;
use GettSleep\Frontdesk\Model\ReserveRoom;
use GettSleep\Frontdesk\Response\ErrorResponse;
use GettSleep\Frontdesk\Response\Response;
use Illuminate\Support\Collection;

class FrontdeskClient implements ExternalBookingClientContract {

    public function __construct(
        protected Client $frontdesk
    ) {

    }

    protected function checkFrontdeskError(Response $response) {
        if ($response instanceof ErrorResponse)
            throw new ExternalBookingServiceError($response->getDescription());
    }

    public function availableRooms(BookingInterval $interval): AvailableRoomCollectionDTO {
        $rooms = $this->frontdesk->findRooms($interval->dateIn(), $interval->dateOut());
        $this->checkFrontdeskError($rooms);

        $collection = new Collection;
        foreach ($rooms->getRooms() as $room) {
            /**@var \GettSleep\Frontdesk\Model\Room $room */
            $collection->push([
                'roomId' => $room->getRoomId(),
                'price' => $room->getPrice(),
                'count' => $room->getCount(),
                'tariffId' => $room->getTariffId(),
                'boardingId' => $room->getBoardingId(),
                'byBedsVariant' => $room->isByBedsVariant(),
            ]);
        }

        return app(AvailableRoomCollectionDTOFactory::class)->make(
            $interval,
            $collection
        );
    }

    public function sendBooking(BookingAggregate $aggregate): ExternalBookingDTO {
        $fdReserves = new Reserves();

        foreach ($aggregate->getRooms() as $room) {
            /**@var \App\Objects\Models\Room $room */
            $fdRoom = new ReserveRoom($room->getExternalId(), $room->getTariffId(), $room->getBoardingId(), $room->getPrice(), $room->getCount());
            $fdContact = new ReserveContact($aggregate->getContactName(), $aggregate->getContactLastName(), $aggregate->getContactPhone(), $aggregate->getContactEmail(), $aggregate->getContactDateOfBirth()->toDateTime());
            $fdPaysystem = new ReservePaysystem($aggregate->getPaysystemExternalId());
            $fdReserves[] = new Reserve(
                $room->getArrival(),
                $room->getDepart(),
                $fdRoom,
                $fdContact,
                $fdPaysystem,
                [],
                1,
                0,
                false,
                false,
                config('frontdesk.booking.source', ''),
                ''
            );
        }

        $orderResponse = $this->frontdesk->createOrder($fdReserves);
        $this->checkFrontdeskError($orderResponse);

        return app(ExternalBookingDTOFactory::class)->make($orderResponse);
    }

    public function paymentStatus(string $bookingId): ExternalPaymentDTO {
        $ps = $this->frontdesk->paymentStatus($bookingId);
        $this->checkFrontdeskError($ps);

        return app(ExternalPaymentDTOFactory::class)->make($ps);
    }

    public function print(string $bookingId): ExternalPrintDTO {
        $print = $this->frontdesk->print($bookingId);
        $this->checkFrontdeskError($print);

        return app(ExternalPrintDTOFactory::class)->make($print);
    }

    public function printStatus(string $commandId): ExternalPrintDTO {
        $printStatus = $this->frontdesk->printStatus($commandId);
        $this->checkFrontdeskError($printStatus);

        return app(ExternalPrintDTOFactory::class)->make($printStatus, $commandId);
    }

    public function annulateBooking(string $bookingId): ExternalAnnulateDTO {
        $annulate = $this->frontdesk->annulateOrder($bookingId);
        $this->checkFrontdeskError($annulate);

        return app(ExternalAnnulateDTOFactory::class)->make($annulate);
    }
}
