<?php

namespace DDD\UI\FormRequests\Api\User\Auth;

use DDD\UI\FormRequests\Api\BaseFormRequest;
use DDD\UI\FormRequests\Interfaces\SigninRequestInterface;

class SigninRequest extends BaseFormRequest implements SigninRequestInterface
{
    public function rules(): array
    {
        return [];
    }
}
