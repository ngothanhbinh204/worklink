<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email);
}
