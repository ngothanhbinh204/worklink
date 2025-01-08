<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function __construct()
    {
        //
    }

    /**
     * kiểm tra quyền Admin
     */

    // Kiểm tra quyền xem danh sách người dùng
    public function viewAny(User $authUser)
    {
        return $authUser->hasPermissionTo('manage users');
    }

    // Kiểm tra quyền xem thông tin chi tiết 1 người dùng  - nếu người dùng đó là chính họ (id) hoặc có quyền xem user
    public function view(User $authUser, User $user )
    {
        return $authUser->id === $user->id || $authUser->hasPermissionTo('view user');
    }

    public function create(User $authUser)
    {
       return $authUser->hasPermissionTo('manage users') || $authUser->hasRole('Admin');
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->hasPermissionTo('update users');
    }

    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->hasPermissionTo('delete users');
    }


    public function viewAsAdmin(User $user)
    {
        // Kiểm tra quyền xem user
        return $user->hasRole('admin');
    }

    public function viewAsUser(User $user)
    {
        // Kiểm tra quyền xem user
        return $user->hasRole('user');
    }

    public function viewAsRecruiter(User $user)
    {
        // Kiểm tra quyền xem user
        return $user->hasRole('recruiter');
    }

    public function Employer(User $user)
    {
        // Kiểm tra quyền xem user
        return $user->hasRole('employer');
    }


}