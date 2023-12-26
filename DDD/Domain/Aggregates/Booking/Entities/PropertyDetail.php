<?php

namespace DDD\Domain\Aggregates\Booking\Entities;

use DDD\Domain\Aggregates\Core\Entities\BaseEntity;

class PropertyDetail extends BaseEntity
{
    protected $table = 'property_details';

    protected $fillable = [
        'property_id',
        'bedrooms',
        'bathrooms',
        'area',
        'floor',
        'parking',
    ];

    public function property()
    {
        return $this->hasOne(Property::class);
    }
}
