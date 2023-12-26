<?php

namespace DDD\Infrastructure\Booking\Repositories;

use DDD\Domain\Aggregates\Booking\Entities\Property;
use DDD\Domain\Aggregates\Booking\Enum\PropertyStatus;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyRepositoryInterface;
use DDD\Infrastructure\Core\Repositories\CoreRepository;

class PropertyRepository extends CoreRepository implements PropertyRepositoryInterface
{
    public function model()
    {
        return Property::class;
    }

    public function getListWithOutBooking()
    {
        return $this->whereHas('bookings', function($q) {
            $q->where('status', PropertyStatus::EMPTY);
        })
        ->orwhereDoesntHave('bookings')->get();
    }
}
