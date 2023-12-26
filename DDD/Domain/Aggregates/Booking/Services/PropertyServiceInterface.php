<?php

namespace DDD\Domain\Aggregates\Booking\Services;

use Illuminate\Support\Facades\Request;

interface PropertyServiceInterface
{
    public function store($request);
}
