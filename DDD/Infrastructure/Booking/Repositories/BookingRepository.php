<?php

namespace DDD\Infrastructure\Booking\Repositories;

use DDD\Domain\Aggregates\Booking\Entities\Booking;
use DDD\Domain\Aggregates\Booking\Repositories\BookingRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyRepositoryInterface;
use DDD\Infrastructure\Core\Repositories\CoreRepository;

class BookingRepository extends CoreRepository implements BookingRepositoryInterface
{
    public function model()
    {
        return Booking::class;
    }

    public function getByStatus($status)
    {
        return 1;
    }
}
