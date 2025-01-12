<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserProfileRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getProfile($userId)
    {
        return $this->model->with(['basicInfo', 'contactInfo'])->find($userId);
    }

    public function updateProfile($userId, array $data)
    {
        $user = $this->model->find($userId);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function deleteProfile($userId)
    {
        $user = $this->model->find($userId);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    public function searchProfiles($keyword)
    {
        return $this->model
            ->where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('email', 'LIKE', "%{$keyword}%")
            ->with(['basicInfo', 'contactInfo'])
            ->get();
    }

    public function addWorkExperience($userId, array $data)
    {
        $user = $this->model->find($userId);
        if ($user) {
            return $user->workExperiences()->create($data);
        }
        return null;
    }

    public function addEducation($userId, array $data)
    {
        $user = $this->model->find($userId);
        if ($user) {
            return $user->educations()->create($data);
        }
        return null;
    }

    public function addSkill($userId, array $data)
    {
        $user = $this->model->find($userId);
        if ($user) {
            return $user->skills()->create($data);
        }
        return null;
    }

    public function addConnection($userId, $connectionId)
    {
        $user = $this->model->find($userId);
        if ($user) {
            return $user->connections()->attach($connectionId);
        }
        return null;
    }
}