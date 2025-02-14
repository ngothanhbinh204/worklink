<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Eloquent\UserServices;
use App\Http\Requests\User\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\BasicInfo;
use App\Models\ContactInfo;
use App\Models\UserAvatar;
use App\Models\UserCoverImage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;
    public $userServices;
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
    public function me()
    {
        return response()->json(Auth::user());
    }
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getAllUserWithRelations($relations);
        return response()->json(['data' => $user, 'mess' => 'admin'], 200);
    }

    public function create() {}

    public function store(UserStoreRequest $request)
    {
        $this->authorize('create', User::class);
        $data = $request->validated();
        $user = $this->userServices->createUserWithRelations($data);
        return response()->json(['message' => 'Tạo người dùng thành công', 'data' => $user], 201);
    }

    public function show(string $id)
    {
        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getUser($id, $relations);
        return new UserResource($user);
    }

    public function showUser($id)
    {
        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getUser($id, $relations);
        return new UserResource($user);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);
        dd("Có thẻ xóa");
        if (!(Auth::user()->hasRole('admin'))) {
            return response()->json(['message' => 'Bạn không có quyền xoá user'], 403);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User không tồn tại'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User đã bị xoá'], 200);
    }
}
