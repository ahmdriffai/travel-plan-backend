<?php

namespace App\Http\Controllers;

use App\Exceptions\RoleInvalidException;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\WebUserLoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register() {
        return view('register');
    }

    public function postRegister(UserRegisterRequest $request) {
        try {
            list($user, $token) = $this->userService->register($request);
            return redirect()->route('form-login')->with('success', 'Berhasil registrasi user');
        } catch (RoleInvalidException $e) {
            return back()->with('error', 'input tidak sesuai');
        } catch(\Exception $e) {
            dd($e->getMessage());
            Log::error($e);
            abort(500);
        }
    }

    public function login() {
        return view('login');
    }

    public function postLogin(WebUserLoginRequest $request) {
        try {
            $login = $this->userService->webLogin($request);
            if ($login) {
                $user = auth()->user();

                if ($user->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                return redirect('/');
            }

            return redirect()->back()->with('error', 'Email dan password tidak sesuai')
                ->withInput($request->only(['email']));
        }catch (\Exception $exception) {
            dd($exception->getMessage());
            abort(500, 'Server Error');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('form-login');
    }
}
