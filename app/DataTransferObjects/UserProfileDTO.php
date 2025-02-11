<?php
namespace App\DataTransferObjects;

class UserProfileDTO
{
    public $id;
    public $name;
    public $email;
    public $basicInfo;
    public $contactInfo;

    public function __construct($user, $basicInfo, $contactInfo)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->basicInfo = $basicInfo;
        $this->contactInfo = $contactInfo;
    }
}