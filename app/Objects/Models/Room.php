<?php


namespace App\Objects\Models;


use Carbon\Carbon;

class Room {
    public function __construct(
        protected BookingInterval $bookingInterval,
        protected ?string $id = null,
        protected ?string $fd24_id  = null,
        protected int $count = 0,
        protected int $availableCount = 0,
        protected int $price = 0,
        protected string $tariffId = '',
        protected string $boardingId = '',
        protected bool $byBedsVariant = false
    ) {
        $this->id = $id;
        $this->fd24_id = $fd24_id;
        $this->count = $count;
        $this->availableCount = $availableCount;
        $this->price = $price;
        $this->bookingInterval = $bookingInterval;
    }

    public function getId() {
        return $this->id;
    }

    public function getExternalId() {
        return $this->fd24_id;
    }

    public function getCount() {
        return $this->count;
    }

    public function getAvailableCount() {
        return $this->availableCount;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInterval(): BookingInterval {
        return  $this->bookingInterval;
    }

    public function canBook() {
        return $this->availableCount >= $this->count;
    }

    public function getArrival(): Carbon {
        return $this->bookingInterval->dateIn();
    }

    public function getDepart(): Carbon {
        return $this->bookingInterval->dateOut();
    }

    /**
     * @return string
     */
    public function getTariffId(): string
    {
        return $this->tariffId;
    }

    /**
     * @return string
     */
    public function getBoardingId(): string
    {
        return $this->boardingId;
    }

    /**
     * @return bool
     */
    public function isByBedsVariant(): bool
    {
        return $this->byBedsVariant;
    }


}
