<?php


namespace App\Services\Booking;

use App\Contracts\BookingRepositoryContract;
use App\Contracts\BookingServiceContract;
use App\Contracts\ExternalBookingClientContract;
use App\Exceptions\BookingRoomAvailabilityException;
use App\Objects\Factories\BookingAggregateFactory;
use App\Objects\Factories\BookingIntervalFactory;
use App\Exceptions\BookingQuantityException;
use App\Objects\Factories\ContactFactory;
use App\Objects\Factories\PaysystemFactory;
use App\Services\Booking\DTO\Factories\BookingDTOFactory;
use App\Services\Booking\DTO\Factories\PaymentDTOFactory;
use App\Services\Booking\DTO\Factories\PaysystemCollectionDTOFactory;
use App\Services\Booking\DTO\Factories\PaysystemDTOFactory;
use App\Services\Booking\DTO\Factories\RoomCollectionDTOFactory;
use App\Services\Booking\DTO\Objects\AnnulateBookingActionDTO;
use App\Services\Booking\DTO\Objects\BookingDTO;
use App\Services\Booking\DTO\Objects\CheckPaymentStatusActionDTO;
use App\Services\Booking\DTO\Objects\CheckPrintStatusDTO;
use App\Services\Booking\DTO\Objects\ExternalAnnulateDTO;
use App\Services\Booking\DTO\Objects\ExternalPrintDTO;
use App\Services\Booking\DTO\Objects\FindRoomsActionDTO;
use App\Services\Booking\DTO\Objects\MakeBookingActionDTO;
use App\Services\Booking\DTO\Objects\PaymentDTO;
use App\Services\Booking\DTO\Objects\PaysystemCollectionDTO;
use App\Services\Booking\DTO\Objects\PrintActionDTO;
use App\Services\Booking\DTO\Objects\RoomCollectionDTO;

class BookingService implements BookingServiceContract {

    public function __construct(
        private ExternalBookingClientContract $_externalBooking,
        private BookingRepositoryContract     $_bookings
    ){
    }

    public function paysystems(): PaysystemCollectionDTO {
        return app(PaysystemCollectionDTOFactory::class)->make($this->_bookings->paysystemsAll());
    }

    public function availableRooms(FindRoomsActionDTO $actionDTO): RoomCollectionDTO {
        $interval = app(BookingIntervalFactory::class)->make($actionDTO->dateIn, $actionDTO->dateOut);
        $availableRooms = $this->_externalBooking->availableRooms($interval);

        if ($availableRooms->rooms->count() > 0) {
            $rooms = $this->_bookings->roomsByExternal($availableRooms->rooms->getIdAll());
            return app(RoomCollectionDTOFactory::class)->make($availableRooms, $rooms);
        }

        return app(RoomCollectionDTOFactory::class)->make();
    }

    public function book(MakeBookingActionDTO $action): BookingDTO
    {
        $available = [];
        $externalIds = [];
        $contact = app(ContactFactory::class)->make($action->contact);
        $paysystem = app(PaysystemFactory::class)->make(app(PaysystemDTOFactory::class)->make($this->_bookings->paysystemById($action->paysystem->id)));

        $requestedRooms = $action->rooms->pluck('id');
        $internalRooms = $this->_bookings->roomsById($requestedRooms->toArray());

        foreach ($action->rooms as $bookingRoom) {
            $interval = app(BookingIntervalFactory::class)->make($bookingRoom->dateIn, $bookingRoom->dateOut);
            $availableRooms = $this->_externalBooking->availableRooms($interval);
            $internalRoom = $internalRooms->firstWhere('id', $bookingRoom->id);
            if (!$availableRooms->rooms->firstWhere('roomId', $internalRoom->fd24_id))
                throw new BookingRoomAvailabilityException($bookingRoom->id);

            $available[] = $availableRooms;
        }

        $internalRooms = app(RoomCollectionDTOFactory::class)->make($internalRooms);

        $booking = app(BookingAggregateFactory::class)->make($contact, $paysystem, $action->rooms, $available, $internalRooms);
        if (!$booking->canBook())
            throw new BookingQuantityException();

        $saved = $this->_bookings->saveBooking($booking);
        $external = $this->_externalBooking->sendBooking($booking);
        $this->_bookings->linkExternalBooking($saved, $external->orderId);

        return app(BookingDTOFactory::class)->make($saved);
    }

    public function paymentStatus(CheckPaymentStatusActionDTO $dto): PaymentDTO {
        $booking = $this->_bookings->bookingById($dto->bookingId);

        return app(PaymentDTOFactory::class)->make((string)$booking->id, $this->_externalBooking->paymentStatus($booking->fd24_id)->status);
    }

    public function print(PrintActionDTO $dto): ExternalPrintDTO {
        $booking = $this->_bookings->bookingById($dto->bookingId);
        return $this->_externalBooking->print($booking->fd24_id);
    }

    public function printStatus(CheckPrintStatusDTO $dto): ExternalPrintDTO {
        return $this->_externalBooking->printStatus($dto->commandId);
    }

    public function annulateBooking(AnnulateBookingActionDTO $dto): ExternalAnnulateDTO {
        $booking = $this->_bookings->bookingById($dto->bookingId);
        return $this->_externalBooking->annulateBooking($booking->fd24_id);
    }
}
