<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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


//public routers
Route::get('/produts/search/{name}',[ProductController::class,'Search']);
Route::get('/produts/edit/{id}',[ProductController::class,'Edit']);
Route::get('/produts',[ProductController::class,'index']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


//private routers
Route::group(['middleware'=>['auth:sanctum']], function () {

    Route::post('/produts/add',[ProductController::class,'Store']);
    Route::put('/produts/update/{id}',[ProductController::class,'Update']);
    Route::delete('/produts/delete/{id}',[ProductController::class,'Delete']);
    Route::post('/logout',[AuthController::class,'logout']);




});
