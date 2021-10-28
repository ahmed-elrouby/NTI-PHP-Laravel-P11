<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\product\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::group(["prefix"=>'dashboard','middleware'=>'verified'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::group(['prefix'=>'products','as'=>'products.'],function () {
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('create',[ProductController::class,'create'])->name('create')->middleware('password.confirm');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('save',[ProductController::class,'save'])->name('save');
        Route::put('update/{product_id}',[ProductController::class,'update'])->name('update');
        Route::delete('delete/{product_id}',[ProductController::class,'delete'])->name('delete');


    });
});

