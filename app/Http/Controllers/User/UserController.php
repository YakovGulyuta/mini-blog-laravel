<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    public function loginForm()
    {

        return view('user.login');
    }

    public function login(Request $request)
    {

        dd(__METHOD__);

    }

    public function logout()
    {

        return redirect()->route('login.create');
    }
}
