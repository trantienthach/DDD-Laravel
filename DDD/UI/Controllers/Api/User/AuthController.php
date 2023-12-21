<?php

namespace DDD\UI\Controllers\Api\User;

use DDD\UI\Controllers\Api\BaseApiController;
use DDD\UI\FormRequests\Api\User\Auth\Interfaces\SignupRequestInterface;

class AuthController extends BaseApiController
{
    public function __construct()
    {

    }

    public function signup(SignupRequestInterface $request)
    {
        dd($request->validated());
    }

    public function signin()
    {

    }
}
