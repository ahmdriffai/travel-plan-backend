<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepositoryImpl implements UserRepository {
    public function create($detail)
    {
        $user = new User($detail);
        $user->save();
        return $user;
    }

    public function findById($id): ? User
    {
        return User::findOrFail($id);
    }

    public function findByEmail($email): ? User
    {
        $user =  User::where('email', $email)->first();
        if ($user == null) {
            throw new ModelNotFoundException('user tidak terdaftar');
        }
        return $user;
    }
}
