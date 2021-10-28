<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\apiTrait;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use apiTrait;
    public function login(LoginRequest $LoginRequest)
    {
        $user = User::where('email', request()->email)->first();
        if (!$user || !Hash::check(request()->password, $user->password)) {
            return $this->ErrorMessage('The Email or Password are incorrect.');
        }
        $user->token = 'Bearer ' . $user->createToken($user->email)->plainTextToken;
        if (!$user->email_verified_at) {
            return $this->DataResponse(compact('user'), 'The User Not Verified.', 401);
        }
        return $this->DataResponse(compact('user'), 'Login Successfully.');
    }
    public function logout()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return $this->SuccessMessage('The User are Logout.');
        }
        return $this->ErrorMessage('This Token Invalid');
    }
    public function logout_all()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $user->tokens()->delete();
            return $this->SuccessMessage('The User are Logout From All Devices.');
        }
        return $this->ErrorMessage('This Token Invalid');
    }
}
