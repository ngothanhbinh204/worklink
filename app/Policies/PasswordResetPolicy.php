<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PasswordResetPolicy
{
    use HandlesAuthorization;


    /**
     * Determine if the given user can request for reset password.
     */
    public function canRequestReset(User $user):bool
    {
         // Kiểm tra user đã xác thực email chưa
      if(!$user->hasVerifiedEmail()){
         return false;
       }
       // Kiểm tra user đã bị block chưa
      if($user->isBlocked()){
         return false;
       }

       // Kiểm tra các điều kiện khác nếu có
        return true;
    }

    /**
     * Determine if the given user can reset the password.
     */
    public function canReset(User $user, string $token, string $email): bool
    {
        // Kiểm tra token có hợp lệ không? còn hạn không?
        $passwordReset = DB::table('password_reset_tokens')
             ->where('token', $token)
            ->where('email', $email)
            ->where('created_at', '>', Carbon::now()->subHours(2))
            ->first();

         if(!$passwordReset){
             return false;
        }

       // Kiểm tra email và user có khớp nhau không
       if($user->email !== $email){
          return false;
        }


       // Kiểm tra các điều kiện khác nếu có
        return true;
    }
}
