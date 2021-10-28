<?php

use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\PasswordController;
use App\Http\Controllers\api\auth\ProfileController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\auth\VerifiyEmailController;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('test',function()
// {
//     return response()->json('ok');
// });
Route::group(
    ['prefix' => 'products', 'middleware' => 'verifiyuser'],
    function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('create', [ProductController::class, 'create']);
        Route::get('edit/{id}', [ProductController::class, 'edit']);
        Route::post('save', [ProductController::class, 'save']);
        Route::put('update/{id}', [ProductController::class, 'update']);
        Route::delete('delete/{id}', [ProductController::class, 'delete']);
    }
);
Route::group(['prefix' => 'users'], function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('sendcode', [VerifiyEmailController::class, 'send_code']);
        Route::get('verifiyemail', [VerifiyEmailController::class, 'verifiy']);
    });
    Route::middleware(['verifiyuser'])->group(function () {
        Route::get('logout', [LoginController::class, 'logout']);
        Route::get('profile', ProfileController::class);
        Route::get('logoutall', [LoginController::class, 'logout_all']);
        Route::post('newpassword', [PasswordController::class, 'new_password']);
    });
    Route::middleware(['guestuser'])->group(function () {
        Route::post('register', RegisterController::class);
        Route::post('login', [LoginController::class, 'login']);
        Route::post('identifyemail', [PasswordController::class, 'identify_email']);
    });
});
