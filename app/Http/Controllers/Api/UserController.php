<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userServices;
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
    public function index()
    {
        $relations = ['basicInfo', 'contactInfo'];
        $user = $this->userServices->getAllUserWithRelations($relations);
        return response()->json($user);
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
