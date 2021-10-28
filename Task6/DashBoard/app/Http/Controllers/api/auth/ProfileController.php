<?php

namespace App\Http\Controllers\api\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\traits\apiTrait;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use apiTrait;
    public function __invoke()
    {
        $token=request()->header('Authorization');
        $user=Auth::guard('sanctum')->user();
        $user->token=$token;
        return $this->DataResponse(compact('user'),'User Profile Data');
    }
}
