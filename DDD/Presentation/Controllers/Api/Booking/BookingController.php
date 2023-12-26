<?php

namespace DDD\Presentation\Controllers\Api\Booking;

use DDD\Domain\Aggregates\Booking\Repositories\BookingRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Services\BookingServiceInterface;
use DDD\Infrastructure\Booking\Repositories\BookingRepository;
use DDD\Infrastructure\Booking\Services\BookingService;
use DDD\Presentation\Controllers\Api\BaseApiController;
use Illuminate\Http\Request;

class BookingController extends BaseApiController
{
    public $bookingServiceInterface;
    public $bookingRepositoryInterface;

    public function __construct(
        BookingServiceInterface $bookingServiceInterface,
        BookingRepositoryInterface $bookingRepositoryInterface,
    ) {
        $this->bookingServiceInterface = $bookingServiceInterface;
        $this->bookingRepositoryInterface = $bookingRepositoryInterface;
    }

    public function store(Request $request, $id)
    {
        $this->bookingServiceInterface->store($request, $id);
        return view('properties', ['status' => 'success']);
    }
}
