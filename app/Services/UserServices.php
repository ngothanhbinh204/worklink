<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserServices
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
    public function getUserByEmail($email)
    {
        return $this->userRepository->getUserByEmail($email);
    }
}