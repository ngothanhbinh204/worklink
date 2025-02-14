<?php

namespace App\Http\Controllers\Api;

use App\Services\Contracts\UserProfileServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Http\Resources\UserProfileResource;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User;

class UserProfileController extends Controller
{
    use AuthorizesRequests;
    protected $userProfileServices;

    public function __construct(UserProfileServiceInterface $userProfileServices)
    {
        $this->userProfileServices = $userProfileServices;
    }

    // Done
    public function show($id)
    {
        $userProfile = $this->userProfileServices->getUserProfile($id);
        if (!$userProfile) {
            return response()->json(['message' => 'User profile không tìm thấy'], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $userProfile
        ]);
    }

    public function update(ProfileUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user); // check quyền

        $validatedData = $request->validated();
        $result = $this->userProfileServices->updateUserProfile($user->id, $validatedData);
        if (isset($result['error'])) {
            return response()->json($result['error'], 400);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật tài khoản thành công',
            'data' => new UserProfileResource($result),
        ]);
    }

    // public function store(Request $request)
    // {
    //     $newProfile = $this->userProfileServices->createUserProfile($request->all());
    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Profile created successfully',
    //         'data' => $newProfile
    //     ], 201);    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('deltete', $user); // check quyền
        dd("Có thể xoa");
        $this->userProfileServices->deleteUserProfile($id);
        return response()->json(null, 204);
    }
}
