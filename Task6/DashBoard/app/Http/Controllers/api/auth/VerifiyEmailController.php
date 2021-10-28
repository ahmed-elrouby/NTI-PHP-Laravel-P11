<?php

namespace App\Http\Controllers\api\auth;

use App\Models\User;
use App\Mail\SendCode;
use Illuminate\Http\Request;
use App\Http\traits\apiTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerifiyEmailController extends Controller
{
    use apiTrait;
    private function commman_verifiy($colmName,$colValue,$message)
    {
        $token = request()->header('Authorization');
        $userInToken = Auth::guard('sanctum')->user();
        if ($userInToken) {
            $user = User::find($userInToken->id);
            if ($user) {
                $user->{$colmName} =$colValue;
                $user->save();
                //mail
                Mail::to($user)->send(new SendCode($user));
                $user->token = $token;
                return $this->DataResponse(compact('user'), $message);
            }
            return $this->ErrorMessage('This User Not Found.');
        }
        return $this->ErrorMessage('The Token Not Found.');
    }
    public function send_code()
    {
        return $this->commman_verifiy('code',rand(10000, 99999),'The Email Send to user Successfully.');
    }
    public function verifiy()
    {
        return $this->commman_verifiy('email_verified_at',date("Y-m-d H:i:s"),'The Email Verified Successfully.');
    }

}
