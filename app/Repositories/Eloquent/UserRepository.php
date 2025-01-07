<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

// kế thừa từ BaseRepository -> có các phương thức cơ bản crud
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

    public function getAllUserWithRelations(array $relations)
    {
       return $this->model->with($relations)->get();
    }

    public function createUserWithRelations(array $userData, array $basicInfo, array $contactInfo)
    {
        $user = $this->model->create($userData);

        // Tạo basic_info và contact_info cho user
        $user->basicInfo()->create($basicInfo);
        $user->contactInfo()->create($contactInfo);

        // mặc định role là 'user
        $role = Role::where('name', 'user')->first();
        if($role && !$user->roles()->where('role_id', $role->id)->exists()) {
            $user->roles()->syncWithoutDetaching([$role->id]);
        }
        return $user;
    }

    public function getUser($id, $relations = []) {
        return $this->model->with($relations)->find($id);
    }

}
