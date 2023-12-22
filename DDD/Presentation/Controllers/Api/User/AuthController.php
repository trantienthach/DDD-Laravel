<?php

namespace DDD\Presentation\Controllers\Api\User;

use DDD\Presentation\Controllers\Api\BaseApiController;
use DDD\Presentation\FormRequests\Api\User\Auth\Interfaces\SignupRequestInterface;

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
