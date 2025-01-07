<?php

namespace App\Repositories\Contracts;

// Kế thừa từ BaseRepositoryInterface -> có các phương thức cơ bản CRUD
interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllUserWithRelations(array $relations);
    public function getUserByEmail(string $email);
}