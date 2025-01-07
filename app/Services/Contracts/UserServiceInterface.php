<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
    public function createUser(array $data);
    public function getAllUsers();
    public function getUserByEmail($email);
    public function getAllUserWithRelations(array $relations);
}
