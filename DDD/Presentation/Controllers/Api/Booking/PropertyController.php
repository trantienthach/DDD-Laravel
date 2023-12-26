<?php

namespace DDD\Presentation\Controllers\Api\Booking;

use DDD\Domain\Aggregates\Booking\Enum\PropertyStatus;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Services\PropertyServiceInterface;
use DDD\Domain\Aggregates\Booking\ValueObject\Price;
use DDD\Domain\Aggregates\Booking\ValueObject\PropertyType;
use DDD\Presentation\Controllers\Api\BaseApiController;
use DDD\Presentation\FormRequests\Api\Booking\Property\Interfaces\StorePropertyRequestInterface;
use Illuminate\Http\Request;

class PropertyController extends BaseApiController
{
    public $propertyServiceInterface;
    public $propertyRepositoryInterface;

    public function __construct(
        PropertyServiceInterface $propertyServiceInterface,
        PropertyRepositoryInterface $propertyRepositoryInterface
    ) {
        $this->propertyServiceInterface = $propertyServiceInterface;
        $this->propertyRepositoryInterface = $propertyRepositoryInterface;
    }

    public function index()
    {
        $properties = $this->propertyRepositoryInterface->getListWithOutBooking();
        foreach ($properties as $property) {
            $price = new Price($property->price, 'USD');
            $type = new PropertyType($property->type);
            $property->price = $price->getAmount();
            $property->type = $type->typeName();
            $property->type_class = $type->typeClass();
        }
        return view('properties', ['properties' => $properties]);
    }

    public function store(StorePropertyRequestInterface $storePropertyRequestInterface)
    {
        $this->propertyServiceInterface->store($storePropertyRequestInterface);
        return view('manage.layout');
    }

    public function show($id)
    {
        $property = $this->propertyRepositoryInterface->find($id);
        $price = new Price($property->price, 'USD');
        $property->price = $price->getAmount();
        return view('contact', ['property' => $property]);
    }
}
