<?php

namespace App\Services\Impl;

use App\Exceptions\RoleInvalidException;
use App\Exceptions\UnauthorizedException;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    function register(UserRegisterRequest $request)
    {
        // validasi role input
        $role = $request->input('role');
        $this->roleValidation($role);

        $userDetail = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $role,
        ];

        $user = $this->userRepository->create($userDetail);
        $token = $user->createToken('auth_token')->plainTextToken;

        return array($user, $token);
    }

    function login(UserLoginRequest $request)
    {
        $email = $request->input('email');
        $credentials = [
            'email' => $email,
            'password' => $request->input('password'),
        ];

        if (!auth()->attempt($credentials)) {
            throw new UnauthorizedException();
        }

        $user = $this->userRepository->findByEmail($email);
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }

    private function roleValidation($role) {
        $roles = array('admin', 'customer');
        if (!in_array($role, $roles)) {
            throw new RoleInvalidException('role tida valid');
        }
    }
}
