<?php

namespace DDD\Presentation\Controllers\Api\User;

use DDD\Domain\Aggregates\User\Repositories\UserRepositoryInterface;
use DDD\Presentation\Controllers\Api\BaseApiController;
use DDD\Presentation\FormRequests\Api\User\Auth\Interfaces\SignupRequestInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends BaseApiController
{
    private $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function login(Request $request)
    {
        $user = $this->userRepositoryInterface->getUser($request->username, $request->password);

        if (!empty($user)) {
            Session::push('adminUser', $request->username);
            Session::push('adminPass', $request->password);
            return view('manage.layout');
        } else {
            return redirect()->back()->with('fail', 'Đăng nhập thất bại');
        }
    }

    public function logout()
    {
        session()->forget('adminUser');
        session()->forget('adminPass');
        return view('manage.login');
    }
}
