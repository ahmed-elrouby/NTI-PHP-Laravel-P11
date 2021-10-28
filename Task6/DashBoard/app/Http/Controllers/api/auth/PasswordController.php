<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\apiTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NewPasswordRequest;
use App\Http\Requests\IdentifyEmailRequest;

class PasswordController extends Controller
{
    use apiTrait;
    public function identify_email(IdentifyEmailRequest $IdentifyEmailRequest)
    {
        $user= User::where('email', request()->email)->first();
        $user->token = 'Bearer '.$user->createToken(request()->email)->plainTextToken;
        return $this->DataResponse(compact('user'),'This Email Exists.');
    }
    public function new_password(NewPasswordRequest $NewPasswordRequest)
    {

        $userAuth=Auth::guard('sanctum')->user();
        $user=User::find($userAuth->id);
        if(Hash::check(request()->password,$user->password))
        {
            return $this->ErrorMessage('The new password are same Old password');
        }
        $user->password = Hash::make(request()->password);
        $user->save();
        $user->token=request()->header('Authorization');
        return $this->DataResponse(compact('user'),'The Password Was Changed.');
    }
}
//1009e6b9c1a95e8306fac316208cc98c13e0ba6486c7e56ee9e8443be7e8dd85
