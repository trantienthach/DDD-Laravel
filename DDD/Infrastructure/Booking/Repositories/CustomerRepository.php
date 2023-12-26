<?php

namespace DDD\Infrastructure\Booking\Repositories;

use DDD\Domain\Aggregates\Booking\Entities\Customer;
use DDD\Domain\Aggregates\Booking\Repositories\CustomerRepositoryInterface;
use DDD\Infrastructure\Core\Repositories\CoreRepository;

class CustomerRepository extends CoreRepository implements CustomerRepositoryInterface
{
    public function model()
    {
        return Customer::class;
    }
}
