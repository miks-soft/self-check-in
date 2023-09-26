<?php


namespace GettSleep\Frontdesk\Model;

class ReserveContact {
    public function __construct(
        protected string    $name,
        protected string    $surname,
        protected string    $phone,
        protected string    $email,
        protected \DateTime $dateOfBirth,
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth(): \DateTime
    {
        return $this->dateOfBirth;
    }


}
