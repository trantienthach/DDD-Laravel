<?php

namespace DDD\Infrastructure\Booking\Services;

use DDD\Domain\Aggregates\Booking\Repositories\PropertyDetailRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Repositories\PropertyRepositoryInterface;
use DDD\Domain\Aggregates\Booking\Services\PropertyServiceInterface;
use DDD\Infrastructure\Core\Services\CoreService;
use Illuminate\Support\Facades\Validator;

class PropertyService extends CoreService implements PropertyServiceInterface
{
    public $propertyRepositoryInterface;
    public $propertyDetailRepositoryInterface;

    public function __construct(
        PropertyRepositoryInterface $propertyRepositoryInterface,
        PropertyDetailRepositoryInterface $propertyDetailRepositoryInterface
    ) {
        $this->propertyRepositoryInterface = $propertyRepositoryInterface;
        $this->propertyDetailRepositoryInterface = $propertyDetailRepositoryInterface;
    }

    public function store($request)
    {
        $file = $request->file('file');
        $destination_Path = public_path('public/image');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move($destination_Path, $file_name);
        $request->offsetSet('image', 'public/image/' . $file_name);

        $property = $this->propertyRepositoryInterface->store($request);
        $this->propertyDetailRepositoryInterface->store($request, ['property_id' => $property->id]);
        return $property;
    }
}
