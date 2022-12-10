<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\RoleInvalidException;
use App\Exceptions\UnauthorizedException;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request) {
        try {
            list($user, $token) = $this->userService->register($request);
            $data = [
                'user' => $user,
                'token' => $token,
            ];

            return $this->responseSuccess($data, 'User Registered');
        } catch (RoleInvalidException $e) {
            return $this->responseError($e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch(ValidationException $e) {
            return $this->responseSuccess($e->errors(), Response::HTTP_BAD_REQUEST);
        } catch(Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }

    public function login(UserLoginRequest $request) {

        try {
            $token = $this->userService->login($request);
            $data = [
                'token' => $token,
            ];

            return $this->responseSuccess($data, 'Login success');
        } catch (UnauthorizedException $e) {
            return $this->responseError($e->getMessage(), Response::HTTP_UNAUTHORIZED);
        } catch(Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }

    public function me(Request $request) {
        try {
            $data = [
                'user' => $request->user(),
            ];

            return $this->responseSuccess($data, 'success');
        } catch(Exception $e) {
            Log::error($e);
            return $this->serverError();
        }

    }

    public function logout(Request $request) {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->responseSuccessWhitoutData('Logout success');
        }catch(Exception $e) {
            Log::error($e);
            return $this->serverError();
        }
    }
}
