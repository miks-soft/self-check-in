<?php


namespace GettSleep\Frontdesk\Model;

class Room {
    public function __construct(
        protected string $roomId,
        protected int $count,
        protected string $price,
        protected string $tariffId,
        protected string $boardingId,
        protected bool $byBedsVariant,
    ) {}

    /**
     * @return string
     */
    public function getRoomId(): string
    {
        return $this->roomId;
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
