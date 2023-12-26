<?php

namespace DDD\Infrastructure\Booking\Services;

use DDD\Domain\Aggregates\Booking\Enum\PropertyStatus;
use DDD\Domain\Aggregates\Booking\Repositories\BookingRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Repositories\CustomerRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Services\BookingServiceInterface;
use DDD\Infrastructure\Core\Services\CoreService;

class BookingService extends CoreService implements BookingServiceInterface
{
    public $bookingRepositoryInterface;
    public $customerRepositoryInterface;

    public function __construct(
        BookingRepositoryInterface $bookingRepositoryInterface,
        CustomerRepositoryInterface $customerRepositoryInterface
    ) {
        $this->bookingRepositoryInterface = $bookingRepositoryInterface;
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function store($request, $id)
    {
        $customer = $this->customerRepositoryInterface->store($request);
        return $this->bookingRepositoryInterface->store($request, [
            'property_id' => $id,
            'customer_id' => $customer->id,
            'status' => PropertyStatus::BOOKING,
        ]);
    }
}
