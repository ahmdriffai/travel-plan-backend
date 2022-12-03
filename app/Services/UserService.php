<?php

namespace App\Services;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

interface UserService {
    public function register(UserRegisterRequest $request);
    public function login(UserLoginRequest $request);
}
