<?php

namespace DDD\Presentation\FormRequests\Api\Booking\Property;

use DDD\Presentation\FormRequests\Api\BaseFormRequest;
use DDD\Presentation\FormRequests\Api\Booking\Property\Interfaces\UpdatePropertyRequestInterface;

class UpdateRequest extends BaseFormRequest implements UpdatePropertyRequestInterface
{
    public function rules(): array
    {
        return [];
    }
}
