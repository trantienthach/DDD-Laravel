<?php

namespace DDD\Domain\Aggregates\Booking\Entities;

use DDD\Domain\Aggregates\Core\Entities\BaseEntity;

class Customer extends BaseEntity
{
    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
