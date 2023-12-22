<?php

namespace DDD\Domain\Aggregates\Booking\Entities;

use DDD\Domain\Aggregates\Core\Entities\BaseEntity;

class Booking extends BaseEntity
{
    protected $table = 'bookings';

    protected $fillable = [
        'customer_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
