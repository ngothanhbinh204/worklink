<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;

class UserServices implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
    public function getUserByEmail($email)
    {
        return $this->userRepository->getUserByEmail($email);
    }

    public function getAllUserWithRelations(array $relations) {
        return $this->userRepository->getAllUserWithRelations($relations);
    }
}