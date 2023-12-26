<?php

namespace DDD\Infrastructure\Booking\Repositories;

use DDD\Domain\Aggregates\Booking\Entities\PropertyDetail;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyDetailRepositoryInterface;
use DDD\Infrastructure\Core\Repositories\CoreRepository;

class PropertyDetailRepository extends CoreRepository implements PropertyDetailRepositoryInterface
{
    public function model()
    {
        return PropertyDetail::class;
    }
}
