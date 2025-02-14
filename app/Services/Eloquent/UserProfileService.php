<?php

namespace App\Services\Eloquent;

use App\DataTransferObjects\UserProfileDTO;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserProfileRepositoryInterface;
use App\Services\Contracts\UserProfileServiceInterface;
use Illuminate\Support\Arr;

use App\Repositories\Contracts\UserRepositoryInterface;
// use App\Services\Contracts\UserServiceInterface;

class UserProfileService implements UserProfileServiceInterface
{
    protected $userProfileRepository;
    protected $userRepository;

    public function __construct(UserProfileRepositoryInterface $userProfileRepository, UserRepositoryInterface $userRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
        $this->userRepository = $userRepository;
    }

    public function getUserProfile($userId)
    {
        return $this->userProfileRepository->getProfile($userId);
    }

    public function updateUserProfile(int $userId, array $data)
    {
        $user = $this->userRepository->getUser($userId);
        if (!$user) {
            return throw new \Exception("User not found");
        }
        $updateUser = $this->userRepository->update($userId, Arr::only($data, ['email']));
        if (isset($data['basic_info'])) {
            $user->basicInfo()->updateOrCreate([], $data['basic_info']);
        };
        // dd(gettype($data['contact_info']['social_links']), $data['contact_info']['social_links']);

        if (isset($data['contact_info'])) {
            if (isset($data['contact_info']['social_links']) && is_string($data['contact_info']['social_links'])) {
                $data['contact_info']['social_links'] = json_decode($data['contact_info']['social_links'], true);
            }
            $user->contactInfo()->updateOrCreate([], $data['contact_info']);
        };
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
