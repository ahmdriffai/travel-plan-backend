<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepository {
    public function create($detail);
    public function findById($id): ?User;
    public function findByEmail($email) : ? User;
}
