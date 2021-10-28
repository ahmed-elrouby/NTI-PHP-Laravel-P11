<?php

namespace App\Http\Controllers\api\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\traits\apiTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    use apiTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,RegisterRequest $RegisterRequest)
    {
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        $user= User::create($data);
        $user->token='Bearer '.$user->createToken($user->name)->plainTextToken;
        return $this->DataResponse(compact('user'),'User Register Successfully.');

    }
}
