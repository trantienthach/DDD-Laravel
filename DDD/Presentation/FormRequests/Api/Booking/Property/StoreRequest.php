<?php

namespace DDD\Presentation\FormRequests\Api\Booking\Property;

use DDD\Presentation\FormRequests\Api\BaseFormRequest;
use DDD\Presentation\FormRequests\Api\Booking\Property\Interfaces\StorePropertyRequestInterface;
use Illuminate\Validation\Rule;

class StoreRequest extends BaseFormRequest implements StorePropertyRequestInterface
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'file' => 'required|image',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'floor' => 'required|integer',
            'parking' => 'required|integer',
        ];
    }
}
