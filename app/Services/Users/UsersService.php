<?php


namespace App\Services\Users;


use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class UsersService
{


    /**
     * @param UserCreateRequest $request
     * @return User
     */
    public function register(UserCreateRequest $request)
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );
        return $user;
    }

    /**
     * @param UserLoginRequest $request
     * @return bool
     */
    public function login(UserLoginRequest $request)
    {
        $user = User::login(
            $request['email'],
            $request['password']
        );
        return $user;
    }
}
