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
        $data['password'] = bcrypt($data['password']);
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

    public function getAllUserWithRelations(array $relations)
    {
        return $this->userRepository->getAllUserWithRelations($relations);
    }

    public function getUser($id, $relations = [])
    {
        return $this->userRepository->getUser($id, $relations);
    }

    public function createUserWithRelations(array $userData) {

        // Tách dữ liệu user, basic_info, contact_info
        $infoMain = [
            'email' => $userData['email'],
            'password' => bcrypt($userData['password'])
        ];
        // dd($infoMain);

       $basicInfo = [
        'first_name' => $userData['first_name'],
        'last_name' => $userData['last_name']
       ];
        // dd($basicInfo);

       $contactInfo = [
        'phone' => $userData['phone'],
        'address' => $userData['address']
       ];

       return $this->userRepository->createUserWithRelations($infoMain, $basicInfo, $contactInfo);
    }
}
