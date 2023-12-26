<?php

namespace DDD\Domain\Aggregates\Booking\Services;

interface BookingServiceInterface
{
    public function store($request, $id);
}
