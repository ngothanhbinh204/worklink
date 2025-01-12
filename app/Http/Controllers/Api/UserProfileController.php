<?php

namespace App\Http\Controllers\Api;

use App\Services\Contracts\UserProfileServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    protected $userProfileServices;

    public function __construct(UserProfileServiceInterface $userProfileServices)
    {
        $this->userProfileServices = $userProfileServices;
    }

    public function show($id)
    {
        $userProfile = $this->userProfileServices->getUserProfile($id);
        return response()->json($userProfile);
    }

    public function update(Request $request, $id)
    {
        $updatedProfile = $this->userProfileServices->updateUserProfile($id, $request->all());
        return response()->json($updatedProfile);
    }

    public function store(Request $request)
    {
        $newProfile = $this->userProfileServices->createUserProfile($request->all());
        return response()->json($newProfile, 201);
    }

    public function destroy($id)
    {
        $this->userProfileServices->deleteUserProfile($id);
        return response()->json(null, 204);
    }
}