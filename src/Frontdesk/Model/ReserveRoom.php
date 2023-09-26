<?php


namespace GettSleep\Frontdesk\Model;

class ReserveRoom {
    public function __construct(
        protected string    $roomId,
        protected string    $tariffId,
        protected string    $boardingId,
        protected string    $price,
        protected int       $count
    ) {}

    /**
     * @return string
     */
    public function getRoomId(): string
    {
        return $this->roomId;
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
     * @return string
     */
    public function getAmount(): string
    {
        return $this->price * $this->count;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }


}
