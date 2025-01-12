<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\BaseRepositoryInterface;

interface UserProfileRepositoryInterface extends BaseRepositoryInterface
{
    public function getProfile($userId);
    public function updateProfile($id, array $data);
    public function deleteProfile($id);
    public function searchProfiles($keyword);
    public function addWorkExperience($userId, array $data);
    public function addEducation($userId, array $data);
    public function addSkill($userId, array $data);
    public function addConnection($userId, $connectionId);

}
