<?php

namespace DDD\Domain\Aggregates\Booking\ValueObject;

class CustomerInfo
{
    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
