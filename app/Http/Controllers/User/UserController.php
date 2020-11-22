<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Model\User;
use App\Services\Users\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * @var UsersService
     */
    private $usersService;

    /**
     * UserController constructor.
     */
    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {

        $this->usersService->register($request);

        return redirect()->route('login')->with('success', 'Пользователь зарегестрированы, введите свои данные');
    }

    public function login(UserLoginRequest $request)
    {
        $this->usersService->login($request);

        return redirect()->route('admin.index')->with('success', 'Вы авторизированы');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index')->with('success', 'Вы вышли');
    }
}
