<?php


namespace App\Objects\Models;

use App\Objects\Collections\RoomCollection;
use Carbon\Carbon;

class BookingAggregate {

    public function __construct(
        protected Booking        $booking,
        protected Contact        $contact,
        protected Paysystem      $paysystem,
        protected RoomCollection $rooms,
    )
    {
    }

    /**
     * @return Booking
     */
    public function getBooking(): Booking
    {
        return $this->booking;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @return Paysystem
     */
    public function getPaysystem(): Paysystem
    {
        return $this->paysystem;
    }

    /**
     * @return RoomCollection
     */
    public function getRooms(): RoomCollection
    {
        return $this->rooms;
    }

    public function canBook() {
        return $this->rooms->canBook();
    }

    public function getContactName():string {
        return $this->contact->getName();
    }

    public function getContactLastName():string {
        return $this->contact->getLastName();
    }

    public function getContactDateOfBirth():Carbon {
        return $this->contact->getDateOfBirth();
    }

    public function getContactEmail():string {
        return $this->contact->getEmail();
    }

    public function getContactPhone():string {
        return $this->contact->getPhone();
    }

    public function getPaysystemExternalId():string {
        return $this->paysystem->getExternalId();
    }
}
