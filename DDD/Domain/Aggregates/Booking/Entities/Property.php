<?php

namespace DDD\Domain\Aggregates\Booking\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use DDD\Domain\Aggregates\Core\Entities\BaseEntity;

class Property extends BaseEntity
{
    protected $table = 'properties';

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'image',
        'booking_quantity',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function propertyDetail()
    {
        return $this->hasOne(PropertyDetail::class);
    }

    public function nameOfType($type)
    {

    }
}
