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

    public function view(User $user, User $targetUser)
    {
       return $user->isAdmin() || $user->id === $targetUser->id;
    }

    public function create(User $user)
    {
        // Kiểm tra quyền tạo user
        return $user->role === 'admin';
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

    public function update(User $user, User $targetUser)
    {
        // Admin có thể chỉnh sửa bất kỳ người dùng nào
        if ($user->role === 'admin') {
            return true;
        }

        // Người dùng chỉ chỉnh sửa info của chính họ
        return $user->id === $targetUser->id;
    }
}