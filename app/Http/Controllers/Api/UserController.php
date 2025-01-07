<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserServices;
use App\Http\Requests\User\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public $userServices;
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
    public function index()
    {

        $role = Role::create(['name' => 'admin']);
        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getAllUserWithRelations($relations);
        return response()->json($user);
    }

    public function create()
    {
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $user = $this->userServices->createUserWithRelations($data);
        return response()->json(['message' => 'Tạo người dùng thành công', 'data' => $user], 201);
    }

    public function show(string $id)
    {

        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getUser($id, $relations);
        return response()->json($user);
    }

    public function showUser($id)
    {
        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getUser($id, $relations);
        return response()->json($user);
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
        //
    }
}