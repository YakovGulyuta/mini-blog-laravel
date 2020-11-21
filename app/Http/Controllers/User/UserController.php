<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(UserCreateRequest $request)
    {
        dd(__METHOD__);
    }

    public function loginForm()
    {

        return view('user.login');
    }

    public function login(UserLoginRequest $request)
    {

        dd(__METHOD__);

    }

    public function logout()
    {

        return redirect()->route('login.create');
    }
}
