<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRegister;
use App\Http\Requests\Userlogin;




use App\Http\Resources\UserResource;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Function register

    public function register(UserRegister $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        $user->createToken('auth_token');
        return response()->json(['user' => $user, 'msg' => 'Đăng ký thành công'], 200);
    }

    // Function login

    public function login(UserLogin $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $tokenResult = $user->createToken('Worklink Access Token');
            $token = $tokenResult->token;
            $token->save();
            return response()->json(['user' => $user, 'token' => $token, 'access_token' => $tokenResult->accessToken, 'token_type' => 'Bearer', 'expires_at' => $tokenResult->token->expires_at, 'msg' => 'Đăng nhập thành công'], 200);
        } else {
            return response()->json(['msg' => 'Đăng nhập thất bại'], 211);
        }
    }

    public function logout(Request $request)
    {
        // Kiểm tra xem người dùng có được xác thực không
    if ($request->user()) {
        // Xóa token của người dùng
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Đăng xuất thành công'
        ], 200);
    }

    // Nếu người dùng không được xác thực
    return response()->json([
        'message' => 'Người dùng chưa được xác thực'
    ], 401);
    }

    public function getMe()
    {
        $user = User::with('roles')->find(Auth::id());
        return new UserResource($user);
        return response()->json(['user' => $user, 'msg' => 'Đăng nhập thành công'], 200);
    }

    public function refresh(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required',
        ]);

        $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => config('passport.password_grant_client.id'),
            'client_secret' => config('passport.password_grant_client.secret'),
            'scope' => '',
        ]);

        return response()->json($response->json(), $response->status());
    }


}
