<?php

namespace App\Services\Contracts;

interface UserProfileServiceInterface
{
    public function getUserProfile(int $userId);
    public function updateUserProfile(int $userId, array $data);
    public function deleteUserProfile(int $userId);
    public function searchProfiles($keyword);

    public function addWorkExperience($userId, array $data);

    public function addEducation($userId, array $data);

    public function addSkill($userId, array $data);

    public function addConnection($userId, $connectionId);
}