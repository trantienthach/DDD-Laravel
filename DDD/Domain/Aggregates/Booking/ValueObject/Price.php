<?php

namespace DDD\Domain\Aggregates\Booking\ValueObject;

class Price
{
    protected $amount;
    protected $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return number_format($this->amount, 0, ',', '.') . ' ' . $this->currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
