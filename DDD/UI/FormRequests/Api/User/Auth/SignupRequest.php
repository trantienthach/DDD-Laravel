<?php

namespace DDD\UI\FormRequests\Api\User\Auth;

use DDD\UI\FormRequests\Api\BaseFormRequest;
use DDD\UI\FormRequests\Api\User\Auth\Interfaces\SignupRequestInterface;
use Illuminate\Validation\Rule;

class SignupRequest extends BaseFormRequest implements SignupRequestInterface
{
    public function rules(): array
    {
        return [
            // 'email' => ['required', 'email', Rule::unique()],
        ];
    }
}
