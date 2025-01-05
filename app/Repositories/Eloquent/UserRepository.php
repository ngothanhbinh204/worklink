<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUserByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }


}