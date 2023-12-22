<?php

namespace DDD\Domain\Aggregates\Booking\Entities;

use DDD\Domain\Aggregates\Core\Entities\BaseEntity;

class Customer extends BaseEntity
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
