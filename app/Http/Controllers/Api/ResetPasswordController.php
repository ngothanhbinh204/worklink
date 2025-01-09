<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\ResetPasswordMail;

use App\Http\Requests\Auth\ResetPassword;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{

    public function sendResetLinkEmail(Request $request)
    {
       $request->validate(['email' => 'required|email|exists:users']);

        $email = $request->email;
        $user = User::where('email',$email)->first();

       if(!$user){
            return response()->json(['message' => 'Email không tồn tại'], 400);
         }


        // Tạo token reset password
        $token = Str::random(60);


        // Lưu token vào database
        DB::table('password_reset_tokens')->insert([
           'email' => $email,
           'token' => $token,
            'created_at' => Carbon::now()
        ]);

         try {
            Mail::to($user->email)->send(new ResetPasswordMail([
                'token' =>  $token,
                 'email' => $user->email
             ]));


             }catch(\Exception $e){
                Log::error("Lỗi khi gửi làm lại mật khẩu: ". $e->getMessage());
                 return response()->json(['message' => 'Có lỗi xảy ra trong quá trình gửi mail, vui lòng liên hệ admin'], 500);
           }

           return response()->json(['message' => 'Vui lòng kiểm tra email để đặt lại mật khẩu!'],200);
     }


      public function reset(ResetPassword $request)
    {
        // dd("abc");

        $validated = $request->validated();

         // Kiểm tra token
         $passwordReset = DB::table('password_reset_tokens')
            ->where('token', $validated['token'])
            ->where('email', $validated['email'])
            ->first();
      if (!$passwordReset) {
            return response()->json(['message' => 'Token hết hạn.'], 400);
       }

       $user = User::where('email',$validated['email'])->first();
       if(!$user){
           return response()->json(['message' => 'Người dùng không tồn tại.'], 400);
      }

        // Update password
       $user->password = bcrypt($validated['password']);
       $user->save();

        // Xóa token đã dùng
       DB::table('password_reset_tokens')
           ->where('token', $validated['token'])
           ->where('email', $validated['email'])
           ->delete();


        return response()->json(['message' => 'Mật khẩu đã được đặt lại thành công.'], 200);
    }
}
