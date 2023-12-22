<?php

namespace DDD\Presentation\FormRequests\Api\User\Auth;

use DDD\Presentation\FormRequests\Api\BaseFormRequest;
use DDD\Presentation\FormRequests\Api\User\Auth\Interfaces\SigninRequestInterface;

class SigninRequest extends BaseFormRequest implements SigninRequestInterface
{
    public function rules(): array
    {
        return [];
    }
}
