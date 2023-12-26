<?php

namespace DDD\Domain\Aggregates\Booking\ValueObject;

class PropertyType
{
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function typeName()
    {
        switch ($this->type) {
            case '1':
                return 'Luxury Villa';
                break;
            case '2':
                return 'Apartment';
                break;
            default:
                return 'Penthouse';
                break;
        }
    }

    public function typeClass()
    {
        switch ($this->type) {
            case '1':
                return 'str';
                break;
            case '2':
                return 'adv';
                break;
            default:
                return 'rac';
                break;
        }
    }
}
