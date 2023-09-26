<?php


namespace GettSleep\Frontdesk\Model;

class Reserve {
    public function __construct(
        protected \DateTime         $arrival,
        protected \DateTime         $depart,
        protected ReserveRoom       $room,
        protected ReserveContact    $contact,
        protected ReservePaysystem  $paysystem,
        protected array             $ages = [],
        protected int               $adults = 1,
        protected int               $children = 0,
        protected bool              $byBedsVariant = false,
        protected bool              $byRequest = false,
        protected string            $source = '',
        protected string            $comment = '',
    ) {}

    /**
     * @return \DateTime
     */
    public function getArrival(): \DateTime
    {
        return $this->arrival;
    }

    /**
     * @return \DateTime
     */
    public function getDepart(): \DateTime
    {
        return $this->depart;
    }

    /**
     * @return array
     */
    public function getAges(): array
    {
        return $this->ages;
    }

    /**
     * @return int
     */
    public function getAdults(): int
    {
        return $this->adults;
    }

    /**
     * @return int
     */
    public function getChildren(): int
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function isByBedsVariant(): bool
    {
        return $this->byBedsVariant;
    }

    /**
     * @return string
     */
    public function getRoomId(): string
    {
        return $this->room->getRoomId();
    }

    /**
     * @return string
     */
    public function getTariffId(): string
    {
        return $this->room->getTariffId();
    }

    /**
     * @return string
     */
    public function getBoardingId(): string
    {
        return $this->room->getBoardingId();
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->room->getAmount();
    }

    /**
     * @return string
     */
    public function getPayed(): string
    {
        return $this->room->getAmount();
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->room->getCount();
    }


    /**
     * @return string
     */
    public function getContactName(): string
    {
        return $this->contact->getName();
    }

    /**
     * @return string
     */
    public function getContactSurname(): string
    {
        return $this->contact->getSurname();
    }

    /**
     * @return string
     */
    public function getContactPhone(): string
    {
        return $this->contact->getPhone();
    }

    /**
     * @return string
     */
    public function getContactEmail(): string
    {
        return $this->contact->getEmail();
    }

    public function getPaymentType(): string
    {
        return $this->paysystem->getType();
    }

    /**
     * @return bool
     */
    public function isByRequest(): bool
    {
        return $this->byRequest;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

}
