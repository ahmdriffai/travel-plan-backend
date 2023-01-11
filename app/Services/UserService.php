<?php

namespace App\Services;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\WebUserLoginRequest;

interface UserService {
    public function register(UserRegisterRequest $request);
    public function login(UserLoginRequest $request);
    public function webLogin(WebUserLoginRequest $request);
}
