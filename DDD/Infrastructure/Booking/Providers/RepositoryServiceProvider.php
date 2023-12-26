<?php

namespace DDD\Infrastructure\Booking\Providers;

use DDD\Domain\Aggregates\Booking\Repositories\BookingRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Repositories\CustomerRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyDetailRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Services\BookingServiceInterface;
use DDD\Domain\Aggregates\Booking\Services\PropertyServiceInterface;
use DDD\Infrastructure\Booking\Repositories\BookingRepository;
use DDD\Infrastructure\Booking\Repositories\CustomerRepository;
use DDD\Infrastructure\Booking\Repositories\PropertyDetailRepository;
use Illuminate\Support\ServiceProvider;
use DDD\Infrastructure\Booking\Repositories\PropertyRepository;
use DDD\Infrastructure\Booking\Services\BookingService;
use DDD\Infrastructure\Booking\Services\PropertyService;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        BookingRepositoryInterface::class => BookingRepository::class,
        BookingServiceInterface::class => BookingService::class,
        CustomerRepositoryInterface::class => CustomerRepository::class,
        PropertyRepositoryInterface::class => PropertyRepository::class,
        PropertyServiceInterface::class => PropertyService::class,
        PropertyDetailRepositoryInterface::class => PropertyDetailRepository::class,
    ];
}
