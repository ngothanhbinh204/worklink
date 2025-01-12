<?php

namespace App\Services\Eloquent;
use App\Repositories\Contracts\UserProfileRepositoryInterface;
use App\Services\Contracts\UserProfileServiceInterface;

class UserProfileService implements UserProfileServiceInterface
{
    protected $userProfileRepository;

    public function __construct(UserProfileRepositoryInterface $userProfileRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
    }

    public function getUserProfile($userId)
    {
        return $this->userProfileRepository->getProfile($userId);
    }

    public function updateUserProfile($userId, array $data)
    {
        return $this->userProfileRepository->updateProfile($userId, $data);
    }

    public function deleteUserProfile($userId)
    {
        return $this->userProfileRepository->deleteProfile($userId);
    }

    public function searchProfiles($keyword)
    {
        return $this->userProfileRepository->searchProfiles($keyword);
    }

    public function addWorkExperience($userId, array $data)
    {
        return $this->userProfileRepository->addWorkExperience($userId, $data);
    }

    public function addEducation($userId, array $data)
    {
        return $this->userProfileRepository->addEducation($userId, $data);
    }

    public function addSkill($userId, array $data)
    {
        return $this->userProfileRepository->addSkill($userId, $data);
    }

    public function addConnection($userId, $connectionId)
    {
        return $this->userProfileRepository->addConnection($userId, $connectionId);
    }
}